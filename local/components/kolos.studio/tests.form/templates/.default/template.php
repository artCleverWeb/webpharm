<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */
\Bitrix\Main\UI\Extension::load('ui.vue3');
?>

<div id="app-form-test">
    <div v-html="getCountQuestions()"></div>
    <div v-html="question.NAME" :data-question-id="question.ID"></div>
    <div class="" v-for="item in question.list">
        <input type="radio" name="question" :value="item.ID" @change="setAnswer($event)">
        <label :for="item.ID" v-html="item.NAME"></label>
    </div>
    <button v-show="showBtn" v-html="btnText" @click="sendResult($event)"></button>
</div>

<script>
    const appFormTest = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                currentNum: 0,
                countNum: <?= $arResult['countQuestions'] ?>,
                componentName: '<?= $this->getComponent()->getName() ?>',
                arParams: <?= CUtil::PhpToJSObject($arParams)?>,
                testId: <?= $arResult['testInfo']['ID'] ?>,
                question: {},
                btnText: "Следующий вопрос",
                showBtn: false,
                answerId: 0,
            }
        },
        watch: {},
        mounted() {
            this.startTest();
            this.getQuestion();
        },
        methods: {
            getCountQuestions() {
                return "Вопрос " + this.currentNum + " из " + this.countNum
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
                        _this.getQuestion()
                    } else {
                        _this.showError(response.data.error ?? "Системная ошибка")
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
                        _this.currentNum++
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