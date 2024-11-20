<?php

namespace Kolos\Studio\Tests;

use Kolos\Studio\Helpers\HighloadBlock;
use \Kolos\Studio\Money\Money;

class UserResult
{
    private int $testId;
    private int $userId;
    private const HL_TABLE_NAME = HL_TABLE_TESTS_RESULT;
    private $questionEntity;
    private $entity;
    private $resultEntity;

    public function __construct(int $testId, int $userId = 0)
    {
        $this->testId = $testId;
        $this->userId = $userId ?? user_id();
    }

    private function getEntity(): HighloadBlock
    {
        if ($this->entity instanceof HighloadBlock === false) {
            $this->entity = new HighloadBlock(self::HL_TABLE_NAME);
        }

        return $this->entity;
    }

    public function getDetailResult(): array
    {
        $result = $this->getLastResult();

        if (count($result) > 0) {
            $result['questions'] = $this->getQuestionEntity()->getAllQuestion(false);
            $result['answers'] = $this->getResultEntity()->getAnswers();
            foreach ($result['questions']['questions'] as &$question) {
                $question['answers'] = $result['questions']['answers'][$question['ID']];
                foreach ($question['answers'] as &$answer) {
                    if ($answer['ID'] == $result['answers'][$question['ID']]) {
                        $answer['IS_SELECTED'] = true;
                    }
                }
                unset($result['questions']['answers'][$question['ID']]);
            }

            unset($result['answers']);
        }

        return $result['questions'];
    }

    public function getLastResult(): array
    {
        $lastResult = $this->getEntity()->getRow([
                'filter' => [
                    'UF_ACTIVE' => 1,
                    'UF_USER_ID' => $this->userId,
                    'UF_TEST_ID' => $this->testId,
                ]
            ]) ?? [];

        if (isset($lastResult['ID'])) {
            return [
                'id' => $lastResult['ID'],
                'date' => $lastResult['UF_DATE']->toString(),
                'result' => $lastResult['UF_CORRECT'],
            ];
        }

        return [];
    }

    public function finishTest(): void
    {
        $lastResult = $this->getLastResult();
        $percent = $this->calculateResult();

        if(count($lastResult) > 0 && isset($lastResult['UF_CORRECT']) && $lastResult['UF_CORRECT'] <= $percent) {
            $this->deactivateOldResult();
        }

        $active = isset($lastResult['UF_CORRECT']) && $lastResult['UF_CORRECT'] <= $percent;

        $data = [
            'UF_USER_ID' => $this->userId,
            'UF_TEST_ID' => $this->testId,
            'UF_CORRECT' => $percent,
            'UF_ACTIVE' => $active ? 1 : 0,
            'UF_FINISHED' => $this->getStatusTest($this->testId) ? 1 : 0,
        ];

        $id = $this->getEntity()->add($data);

        $this->calculateBalance($data, $id);
    }

    private function getStatusTest(int $testId, int $value): bool
    {
        $testEntity = new Test();
        $testEntity->setTestId($testId);
        $testInfo = $testEntity->getInfo();

        if (count($testInfo) < 0) {
            return false;
        }

        if ($testInfo['UF_COMPLETED_SCORE'] > $value) {
            return false;
        }

        return true;
    }

    private function calculateBalance(array $data, int $id): bool
    {
        $testEntity = new Test();
        $testEntity->setTestId($data['UF_TEST_ID']);
        $testInfo = $testEntity->getInfo();

        if ($id < 1) {
            return false;
        }

        if (count($testInfo) < 0) {
            return false;
        }

        if ($testInfo['UF_COMPLETED_SCORE'] > $data['UF_CORRECT']) {
            return false;
        }

        $moneyEntity = new Money();
        $moneyEntity->setEntityType(Money::entityCourse);
        $moneyEntity->setDirectionType(Money::directionCredit);
        $moneyEntity->setTaxType(Money::taxPoints);
        $moneyEntity->setEntityId($data['UF_TEST_ID']);
        $moneyEntity->setUserId($data['UF_USER_ID']);

        $resultPoints = $moneyEntity->store($testInfo['UF_POINTS']);
        $resultMoney = false;

        if ($testInfo['UF_MONEY'] > 0) {
            $moneyEntity->setTaxType(Money::taxRouble);

            if ($testInfo['UF_COUNT_PEOPLE'] > 0) {
                $count = $moneyEntity->getCount(false);
                echo $count;
                if ($count < $testInfo['UF_COUNT_PEOPLE']) {
                    $resultMoney = $moneyEntity->store($testInfo['UF_MONEY']);
                }
            } else {
                $resultMoney = $moneyEntity->store($testInfo['UF_MONEY']);
            }
        }

        if ($resultMoney || $resultPoints) {
            $update = [];

            if($resultMoney){
                $update['UF_ADD_MONEY'] = 1;
            }

            if($resultPoints){
                $update['UF_ADD_POINTS'] = 1;
            }

            $this->getEntity()->update($id, $update);
        }

        return true;
    }

    private function calculateResult(): int
    {
        $allQuestions = 0;
        $correctAnswer = 0;

        $questions = $this->getQuestionEntity()->getAllQuestion(true);
        $answers = $this->getResultEntity()->getAnswers();

        foreach ($questions['questions'] as $question) {
            $allQuestions++;
            $questionsId = $question['ID'];

            $correctId = current($questions['answers'][$questionsId])['ID'] ?? 0;

            if (isset($answers[$questionsId]) && $answers[$questionsId] == $correctId) {
                $correctAnswer++;
            }
        }

        $percent = (($correctAnswer - $allQuestions) / $allQuestions) * 100;
        $percent = 100 - ($percent > 0 ? $percent : 0 - $percent);

        return round($percent);
    }

    private function deactivateOldResult(): void
    {
        $oldList = $this->getEntity()->find([
            'filter' => [
                'UF_USER_ID' => $this->userId,
                'UF_TEST_ID' => $this->testId,
                'UF_ACTIVE' => 1,
            ],
            'select' => [
                'ID',
            ]
        ]);

        foreach ($oldList as $item) {
            $this->getEntity()->update(
                $item['ID'],
                [
                    'UF_ACTIVE' => 0,
                ]
            );
        }
    }

    private function getQuestionEntity(): Question
    {
        if ($this->questionEntity instanceof Question === false) {
            $this->questionEntity = new Question($this->testId);
        }

        return $this->questionEntity;
    }

    private function getResultEntity(): Result
    {
        if ($this->resultEntity instanceof Result === false) {
            $this->resultEntity = new Result($this->testId, $this->userId);
        }

        return $this->resultEntity;
    }
}
