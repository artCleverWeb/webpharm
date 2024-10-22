<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var global $APPLICATION
 * @var $arResult
 */
\Bitrix\Main\UI\Extension::load('ui.vue3');
?>

<div class="grid grid_layout-1" id="app-user-registration">
    <div class="grid__item grid__item_1">
        <template v-if="showRegisterForm">
            <div class="registration js-registration">
                <form action="#" class="form registration__form" method="post">
                    <div class="logo-a form__logo">
                        <img src="/assets/images/logo-1.png" alt="WebPharm.ru" class="logo-a__img"/>
                    </div>
                    <div class="form__head">
                        <div class="title title_size-2 form__title">
                            Регистрация
                        </div>
                    </div>
                    <div class="form-notice" v-if="notices.length > 0">
                        <div class="form-notice__item" v-for="notice in notices">
                            <span v-html="notice"></span>
                        </div>
                    </div>
                    <div class="form-error" v-if="errors.length > 0">
                        <div class="form-error__item" v-for="error in errors">
                            <span v-html="error"></span>
                        </div>
                    </div>

                    <div class="form-wrap" v-if="block_reg">
                        Вы уже регистрировались ранее.<br>
                        Ваш логин заблокирован.<br>
                        Обратитесь к администрации сайта.
                    </div>
                    <div class="form__fields">
                        <div class="form__item">
                            <div class="form__caption">
                                Телефон
                            </div>
                            <div class="field-form form__field-form">
                                <input type="text" name="mobile" class="input-text field-form__input-text"
                                       :disabled="showBtn ? '' : disabled"
                                       :value="phone" placeholder="+7 (9 -- ) --- -- -- " data-mask="+7 (000) 000-00-00"
                                       v-model="phoneNumber">
                            </div>
                            <div class="form__info form__info_error">
                                Поле заполнено неверно
                            </div>
                        </div>
                        <div class="form__item" v-if="showBtn">
                            <div class="form__caption">
                                Код из СМС
                            </div>
                            <div class="field-form form__field-form">
                                <input type="text" name="code" class="input-text field-form__input-text" v-model="code"
                                       @input="changeCode">
                            </div>
                            <div class="form__info form__info_error">
                                Поле заполнено неверно
                            </div>
                        </div>
                        <div v-if="showTimerNeed">Показывать таймер</div>
                        <div class="form__item form__item_submit" v-if="showBtnSendSms">
                            <button type="submit" name="send" value="Y"
                                    class="button-a button-a_size-1 button-a_wide form__button-submit"
                                    @click="sendSms($event)">
                                Отправить СМС
                            </button>
                        </div>
                        <div class="form__item form__item_submit" v-if="showBtn">
                            <button type="submit" name="send" value="Y" :disabled="showBtnDisabled ? '' : disabled"
                                    class="button-a button-a_size-1 button-a_wide form__button-submit"
                                    @click="registerAction($event)">
                                Зарегистрироваться
                            </button>
                        </div>
                        <div class="form__item form__item_submit">
                            <label class="input-button">
                                <input type="checkbox" class="input-button__input" name="agree" value="Y" checked
                                       @change="agreeChange"/>
                                <div class="input-button__icon"></div>
                                <div class="input-button__text">
                                    Я ознакомлен с <a href="/pages/conf_policies.php" target="_blank">Политикой<br/>
                                        конфиденциальности</a> и <a href="/pages/user_agreements.php" target="_blank">Пользовательским
                                        соглашением</a>.
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </template>

        <template v-if="showPageSecond">
            <div class="user-choice js-user-choice">
                <form action="#" class="form user-choice__form">
                    <div class="logo-a form__logo">
                        <img src="/assets/images/logo-1.png" alt="" class="logo-a__img"/>
                    </div>
                    <div class="form__head">
                        <div class="title title_size-2 form__title">
                            Центр обучения <span class="color-brand">Эркафарм</span>
                        </div>
                    </div>
                    <div class="form-notice" v-if="notices.length > 0">
                        <div class="form-notice__item" v-for="notice in notices">
                            <span v-html="notice"></span>
                        </div>
                    </div>
                    <div class="form-error" v-if="errors.length > 0">
                        <div class="form-error__item" v-for="error in errors">
                            <span v-html="error"></span>
                        </div>
                    </div>
                    <div class="form__fields">
                        <div class="form__item">
                            <a href="#" class="button-a button-a_size-1 button-a_wide" @click="setUserState($event)"
                               data-state="false">
                                Новым сотрудникам
                            </a>
                        </div>
                        <div class="form__item">
                            <a href="#" class="button-a button-a_size-1 button-a_wide" @click="setUserState($event)"
                               data-state="true">
                                Опытным сотрудникам
                            </a>
                        </div>
                        <div class="form__item">
                            <a href="/journal/" class="button-a button-a_size-1 button-a_wide"
                               @click="setUserState($event)" data-state="true">
                                Опытным сотрудникам
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </template>
    </div>
    <div class="grid__item grid__item_2">
        <template v-if="showRegisterForm">
            <div class="menu-a">
                <div class="menu-a__text">
                    Если вы уже зарегистрированы, пройдите на форму авторизации
                </div>
                <div class="menu-a__list">
                    <div class="menu-a__item">
                        <a href="/login/" class="link link_type-1 link_color-1 menu-a__item-link">
                            Авторизоваться
                        </a>
                    </div>
                </div>
            </div>
        </template>

        <template v-if="showPageSecond">
            <div class="grid__item grid__item_2">
                <div class="menu-a">
                    <div class="menu-a__list">
                        <div class="menu-a__item">
                            <a href="/?logout=yes" class="link link_type-1 link_color-1 menu-a__item-link">
                                Выйти
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
<script>

    const appUserReg = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                componentName: '<?= $this->getComponent()->getName() ?>',
                errors: {},
                list: {},
                notices: {},
                block_reg: false,
                phone: "",
                agree: true,
                showBtn: false,
                showBtnDisabled: true,
                showBtnSendSms: true,
                showTimerNeed: false,
                code: "",
                showRegisterForm: true,
                showPageSecond: false
            }
        },
        computed: {
            phoneNumber: {
                get: function () {
                    return this.phone
                },
                set: function (value) {
                    value = value.substr(0, 18)
                    this.phone = value
                }
            },
            code: {
                get: function () {
                    return this.code
                },
                set: function (value) {
                    this.code = value
                    console.log(this.code);
                    if (this.code.length >= 4) {
                        this.showBtnDisabled = false
                    } else {
                        this.showBtnDisabled = true
                    }
                }
            }
        },
        watch: {},
        mounted() {

        },
        methods: {
            setUserState($event) {
                const state = $event.target.dataset.state
                const _this = this

                $event.preventDefault()

                this.send('setState', {state: state})
                    .then(function (response) {
                        _this.errors = response.data.errors ?? response.errors ?? {}

                        if (response.data.redirect) {
                            document.location.href = response.data.redirect;
                        }
                    }, function (error) {
                        console.log(error.message)
                    })
            },
            changeCode($event) {
                const value = $event.target.value
                this.code = value

                if (this.code.length >= 4) {
                    this.showBtnDisabled = false
                } else {
                    this.showBtnDisabled = true
                }
            },
            agreeChange($event) {
                this.agree = $event.target.checked == 1
            },
            registerAction($event) {
                const _this = this

                $event.preventDefault()

                if (_this.phone.length == 18) {
                    this.send('checkCode', {mobile: _this.phone, password: _this.code})
                        .then(function (response) {
                            _this.errors = response.data.errors ?? response.errors ?? {}

                            if (response.data.redirect) {
                                document.location.href = response.data.redirect;
                            }

                            if (response.data.state === true) {
                                _this.showRegisterForm = false
                                _this.showPageSecond = true
                            }
                        }, function (error) {
                            console.log(error)
                        })
                }
            },
            sendSms($event) {
                const _this = this

                $event.preventDefault()

                if (_this.phone.length == 18) {
                    this.send('sendSms', {mobile: _this.phone, agree: _this.agree})
                        .then(function (response) {
                            _this.errors = response.data.errors ?? response.errors ?? {}
                            _this.block_reg = response.data.block_reg ?? false
                            _this.showBtn = response.data.state ?? false

                            _this.showTimer()

                            if (response.data.redirect) {
                                document.location.href = response.data.redirect;
                            }

                        }, function (error) {
                            console.log(error)
                        })
                }
            },
            showTimer() {
                const _this = this
                _this.showTimerNeed = true
                _this.showBtnSendSms = false

                setTimeout(function () {
                    _this.showTimerNeed = false
                    _this.showBtnSendSms = true
                }, 59000);
            },
            send(method, fields, asFormData) {
                const _this = this

                let params = {
                    mode: 'class',
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
    }).mount('#app-user-registration');
</script>