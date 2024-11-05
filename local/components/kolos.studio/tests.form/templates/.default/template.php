<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */
\Bitrix\Main\UI\Extension::load('ui.vue3');
?>
<style>
    .userSelect:before {
        height: 40px;
        content: '\2713';
        color: red;
        width: 40px;
        font-size: 23px;
    }
    .green {
        background: #0080004f;
    }
</style>
<div id="app-form-test">
    <template v-if="!finishTest">
        <div v-html="getCountQuestions()"></div>
        <div v-html="question.NAME" :data-question-id="question.ID"></div>
        <div class="" v-for="item in question.list">
            <input type="radio" :name="question.ID" :value="item.ID" @change="setAnswer($event)">
            <label :for="item.ID" v-html="item.NAME"></label>
        </div>
        <button v-show="showBtn" v-html="btnText" @click="sendResult($event)"></button>
        <div v-show="testNeedResult > 0">
            Для успешного прохождения теста число правильных ответов должно составить не менее <span
                    v-html="testNeedResult"></span>%
        </div>
        <div v-show="lastResult.result != undefined">
            Результат прошлого теста: <span v-html="lastResult.result"></span>%
        </div>
        <div v-html="getMoneyNotification()"></div>
        <div v-html="getPointsNotification()"></div>
    </template>
    <template v-if="finishTest && !showDetail">
        <div>
            Поздравляем!
            <div v-html="showResult()"></div>
        </div>
        <div>
            <button v-if="currentPercent < 100">Пройти тест еще раз</button>
            <button @click="showDetailResult($event)">Посмотреть результат подробно</button>
        </div>
    </template>
    <template v-if="finishTest && showDetail">
        <h1>Результаты тестирования</h1>
        <div v-html="showResultMessage()"></div>
        <div>Правильные ответы обведены зеленым цветом. Ваши ответы отмечены галочками</div>
        <hr>
        <template v-for="question in detailResultTest.questions">
            <div v-html="question.NAME"></div>
            <template v-for="answer in question.answers">
                <div v-html="answer.NAME" :class="{green: answer.IS_CORRECT, userSelect: answer.IS_SELECTED}"></div>
            </template>
            <hr>
        </template>
        <div>
            <button v-if="currentPercent < 100">Пройти тест еще раз</button>
            <a href="/">К списку курсов</a>
        </div>
    </template>
</div>

<script>
    const appFormTest = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                currentNum: '',
                countNum: <?= $arResult['countQuestions'] ?>,
                componentName: '<?= $this->getComponent()->getName() ?>',
                arParams: <?= CUtil::PhpToJSObject($arParams)?>,
                testId: <?= $arResult['testInfo']['ID'] ?>,
                testNeedResult: <?= $arResult['testInfo']['UF_COMPLETED_SCORE'] ?? 0?>,
                testMoneyResult: <?= $arResult['testInfo']['UF_MONEY'] ?? 0?>,
                testMoneyPeople: <?= $arResult['testInfo']['UF_COUNT_PEOPLE'] ?? 0?>,
                testPointsResult: <?= $arResult['testInfo']['UF_POINTS'] ?? 0?>,
                question: {},
                btnText: "Следующий вопрос",
                showBtn: false,
                answerId: 0,
                lastResult: {},
                finishTest: <?= $arResult['finishTest'] ?? false?>,
                currentPercent: 0,
                showDetail: false,
                detailResultTest: {},
            }
        },
        watch: {},
        mounted() {
            if(this.finishTest){
                this.showFinishPage()
            }
            else{
                this.startTest()
                this.getQuestion()
                this.getLastResult()
            }
        },
        methods: {
            getPointsNotification() {
                if (/*this.testMoneyResult <= 0 && */this.testPointsResult > 0) {
                    return 'При успешном прохождении вы получите ' + this.testPointsResult + ' баллов'
                }
                return '';
            },
            showDetailResult($event) {
                const _this = this

                $event.preventDefault()
                _this.send("getDetailResultTest", {
                    testId: _this.testId,
                }).then(function (response) {
                    if (response.status === 'success') {
                        _this.detailResultTest = response.data ?? {}
                        _this.showDetail = true
                    }
                }, function (error) {
                    _this.showError(error ?? "Системная ошибка")
                })
            },
            getMoneyNotification() {
                if (this.testMoneyResult > 0) {
                    if (this.testMoneyPeople > 0) {
                        return 'При успешном прохождении первые ' + this.testMoneyPeople + ' пользователей получат ' + this.testMoneyResult + ' руб'
                    } else {
                        return 'При успешном прохождении вы получите ' + this.testMoneyResult + ' руб '
                    }
                }
                return '';
            },
            getCountQuestions() {
                return this.currentNum > 0 ? "Вопрос " + this.currentNum + " из " + this.countNum : ''
            },
            showResultMessage() {
                if (this.currentPercent >= this.testPointsResult) {
                    return "Тест пройден: <b>" + this.currentPercent + "%</b> правильных ответов"
                } else {
                    return "Тест не пройден: <b>" + this.currentPercent + "%</b> правильных ответов"
                }

            },
            showResult() {
                return "Вы завершили тест, Ваш результат " + this.currentPercent + "%, при необходимых " + this.testPointsResult + "%"
            },
            showFinishPage() {
                const _this = this

                _this.send("getLastResult", {
                    testId: _this.testId,
                }).then(function (response) {
                    if (response.status === 'success') {
                        _this.currentPercent = response.data.result ?? 0
                    }
                }, function (error) {
                    _this.showError(error ?? "Системная ошибка")
                })
            },
            sendResult($event) {
                const _this = this

                $event.preventDefault()

                _this.send("sendResult", {
                    testId: _this.testId,
                    questionId: _this.question.ID,
                    answerId: _this.answerId,
                }).then(function (response) {
                    if (response.status === 'success' && response.data.status == true) {
                        if (response.data.isFinish === true) {
                            _this.finishTest = true
                            _this.showFinishPage()
                        } else {
                            _this.getQuestion()
                        }
                    } else {
                        _this.showError(response.data.error ?? "Системная ошибка")
                    }
                }, function (error) {
                    _this.showError(error ?? "Системная ошибка")
                })
            },
            getLastResult() {
                const _this = this

                _this.send("getLastResult", {
                    testId: _this.testId,
                }).then(function (response) {
                    if (response.status === 'success') {
                        _this.lastResult = response.data ?? {}
                       }
                }, function (error) {
                    _this.showError(error ?? "Системная ошибка")
                })
            },
            setAnswer($event) {
                this.showBtn = true
                this.answerId = $event.target.value
                $event.preventDefault()
            },
            startTest() {
                const _this = this;
                _this.send("startTest", {
                    testId: _this.testId
                }).then(function (response) {
                }, function (error) {
                    _this.showError(error ?? "Системная ошибка")
                })
            },
            getQuestion() {
                const _this = this;
                _this.send("getQuestion", {
                    testId: _this.testId
                }).then(function (response) {
                    if (response.status === 'success') {
                        _this.question = response.data || {}
                        _this.showBtn = false
                        _this.currentNum = response.data.numQuestion

                        if (_this.currentNum == _this.countNum) {
                            _this.btnText = "Завершить тестирование"
                        }
                    }
                }, function (error) {
                    _this.showError(error ?? "Системная ошибка")
                })
            },
            showError(error) {
                alert(error);
            },
            send(method, fields, asFormData) {
                const _this = this

                let params = {
                    mode: 'class',
                    arParams: _this.arParams,
                }

                if (fields && asFormData) {
                    let formData = new FormData()

                    for (const field in fields) {
                        let value = fields[field]

                        formData.append(field, value)
                    }

                    params.data = formData
                } else {
                    if (fields) {
                        params.data = {fields: fields}
                    }
                }

                params.data = {
                    arParams: _this.arParams,
                    fields: fields ?? {}
                };

                return new Promise(function (resolve, reject) {
                    BX.ajax.runComponentAction(
                        _this.componentName,
                        method,
                        params
                    )
                        .then(function (response) {
                            resolve(response)

                        }, function (response) {
                            reject(response.errors[0])
                        })
                        .catch(err => {
                            console.log(err)
                        })
                })

            },
        },
        created() {
        },
    }).mount('#app-form-test');
</script>