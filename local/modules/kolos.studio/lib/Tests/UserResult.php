<?php

namespace Kolos\Studio\Tests;

use Kolos\Studio\Helpers\HighloadBlock;

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

    public function finishTest(): void
    {
        $this->deactivateOldResult();
        $percent = $this->calculateResult();

        $this->getEntity()->add(
            [
                'UF_USER_ID' => $this->userId,
                'UF_TEST_ID' => $this->testId,
                'UF_CORRECT' => $percent,
                'UF_ACTIVE' => 1,
            ]
        );
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

        $percent = (($allQuestions - $correctAnswer) / (($allQuestions + $correctAnswer) / 2)) * 100;
        return round($percent);
    }

    private function deactivateOldResult(): void
    {
        $oldList = $this->getEntity()->find([
            'filter' => [
                'UF_USER_ID' => $this->userId,
                'UF_TEST_ID' => $this->testId,
                'UF_ACTIVE' => 'Y',
            ],
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
