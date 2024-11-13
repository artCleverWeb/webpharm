import { Controller } from "@hotwired/stimulus";
import { popup } from "../../../components/popup/popup";

export default class extends Controller {
    /* Элементы, помеченные атрибутом data-testing-target="..." доступны в контроллере */
    /* Доступ: this.questionTarget или this.questionTargets */
    static targets = [
        'question',
        'numberCorrectAnswers',
        'numberRequiredAnswers',
        'numberCorrectAnswersPrevious',
    ];

    /* Переменные, их также можно указать в атрибуте контроллера data-testing-completed-value="false", приоритет у атрибута */
    /* Доступ: this.completedValue = true; */
    /* Если свойство изменилось, вызывается функция: completedValueChanged(value) {...} */
    static values = {
        idQuestionActive: { type: String, default: '1' },
        completed: { type: Boolean, default: false },
        resultFullShown: { type: Boolean, default: false },
        numberCorrectAnswers: { type: Number, default: 0 },
        numberRequiredAnswers: { type: Number, default: 100 },
        numberCorrectAnswersPrevious: { type: Number, default: 0 },
        success: { type: Boolean, default: false },
    };

    /* Срабатывает после добавления элемента в DOM */
    connect() {
        /* Тестовый показ попапа */
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.get('popup-testing-cancel')) {
            popup.open('#popup-testing-cancel');
        }
    }

    /* Срабатывает после удаления элемента из DOM */
    disconnect() {
        
    }

    /* Срабатывает после добавления элемента target в DOM */
    questionTargetConnected(element) {
        const objectController = this;

        $('.question-mini__answer-input', element).on('change', function() {
            if ($(element).hasClass('question-mini_invalid')) {
                objectController.validateQuestion(element);
            }
        });
    }

    validateQuestion(questionTarget) {
        const numberMinAnswers = Number(questionTarget.dataset.numberMinAnswers) || 1;
        const numberSelectedAnswers = this.getNumberSelectedAnswers(questionTarget);
        let validQuestion = true;

        if (numberSelectedAnswers < numberMinAnswers) {
            validQuestion = false;
        }

        if (validQuestion) {
            $(questionTarget).removeClass('question-mini_invalid');
        } else {
            $(questionTarget).addClass('question-mini_invalid');
        }

        return validQuestion;
    }

    getQuestionActive() {
        const { questionTargets, idQuestionActiveValue } = this;

        const questionActive = questionTargets.find((questionTarget) => {
            return questionTarget.dataset.questionId === idQuestionActiveValue;
        });

        return questionActive;
    }

    getQuestionPrev() {
        const questionTarget = this.getQuestionActive().previousElementSibling;
        return questionTarget;
    }

    getQuestionNext() {
        const questionTarget = this.getQuestionActive().nextElementSibling;
        return questionTarget;
    }

    toPrevQuestion() {
        const questionTarget = this.getQuestionNext();
        const questionActive = this.getQuestionActive();

        if (this.validateQuestion(questionActive) && questionTarget) {
            this.idQuestionActiveValue = questionTarget.dataset.questionId;
        }
    }

    toNextQuestion() {
        const questionTarget = this.getQuestionNext();
        const questionActive = this.getQuestionActive();

        if (this.validateQuestion(questionActive) && questionTarget) {
            this.idQuestionActiveValue = questionTarget.dataset.questionId;
        }
    }

    getNumberSelectedAnswers(questionTarget) {
        const numberSelectedAnswers = $('.question-mini__answer-input:checked', questionTarget).length
        return numberSelectedAnswers;
    }

    isAnswerCorrect(questionTarget) {
        let correct = true;

        $('.question-mini__answer', questionTarget).each(function() {
            const answer = {
                $el: $(this),
            };

            answer.$input = $('.question-mini__answer-input', this);
            answer.correct = $(this).data('answer-correct');
            answer.checked = answer.$input.prop('checked');

            if ((answer.checked && !answer.correct) || (!answer.checked && answer.correct)) {
                correct = false;
            }
        });

        return correct;
    }

    getNumberCorrectAnswers() {
        const { questionTargets } = this;
        const numberQuestions = questionTargets.length;
        let numberCorrectAnswers = 0;

        questionTargets.forEach((questionTarget) => {
            let correct = this.isAnswerCorrect(questionTarget);

            if (correct) {
                numberCorrectAnswers += 1; 
            }
        });

        return Math.round((numberCorrectAnswers / numberQuestions) * 100);
    }

    showResult() {
        const questionActive = this.getQuestionActive();

        if (this.validateQuestion(questionActive)) {
            this.completedValue = true;
            this.numberCorrectAnswersValue = this.getNumberCorrectAnswers();

            if (this.numberCorrectAnswersValue >= this.numberRequiredAnswersValue) {
                this.successValue = true;
            }
        }
    }

    showResultFull() {
        this.resultFullShownValue = true;
    }

    repeat() {
        const idQuestionFirst = this.questionTargets[0].dataset.questionId;

        this.idQuestionActiveValue = idQuestionFirst;
        this.completedValue = false;
        this.resultFullShownValue = false;
        this.numberCorrectAnswersPreviousValue = this.numberCorrectAnswersValue;
        this.numberCorrectAnswersValue = 0;
        this.resetQuestions();
    }

    resetQuestions() {
        $('.question-mini__answer-input', this.questionTargets).prop('checked', false);
    }

    idQuestionActiveValueChanged(idQuestionActive) {
        const { questionTargets } = this;

        questionTargets.forEach((questionTarget) => {
            if (questionTarget.dataset.questionId === idQuestionActive) {
                $(questionTarget).addClass('active');
            } else {
                $(questionTarget).removeClass('active');
            }
        });
    }

    completedValueChanged(completed) {
        if (completed) {
            $(this.element).addClass('testing_completed');
        } else {
            $(this.element).removeClass('testing_completed');
        }
    }

    resultFullShownValueChanged(resultFullShown) {
        if (resultFullShown) {
            $(this.element).addClass('testing_result-full');
        } else {
            $(this.element).removeClass('testing_result-full');
        }
    }

    numberCorrectAnswersValueChanged(value) {
        this.numberCorrectAnswersTargets.forEach((element) => {
            $(element).text(`${value}%`);
        });
    }

    numberRequiredAnswersValueChanged(value) {
        this.numberRequiredAnswersTargets.forEach((element) => {
            $(element).text(`${value}%`);
        });
    }

    successValueChanged(value) {
        $(this.element).removeClass('testing_success testing_failure');

        if (value) {
            $(this.element).addClass('testing_success');
        } else {
            $(this.element).addClass('testing_failure');
        }
    }

    numberCorrectAnswersPreviousValueChanged(value) {
        this.numberCorrectAnswersPreviousTargets.forEach((element) => {
            $(element).text(`${value}%`);
        });
    }

}