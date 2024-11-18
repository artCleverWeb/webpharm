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


<div class="header header_margin-1 content__header">
    <a href="/" class="header__nav-button header__nav-button_back">
        <svg class="icon header__nav-button-icon">
            <use xlink:href="/assets/images/icons/icons.svg#icon-arrow-2"></use>
        </svg>
    </a>
    <div class="headline">
        <h1 class="title title_size-2 headline__title">
            Мой кошелёк
        </h1>
    </div>
    <div class="header__text">
        <p>
            Баллы в «Мой кошелёк» – начисляются за выполнение приказа об обязательном обучении.<br/>
            Из «Моего кошелька» периодически (раз в месяц) происходит списание баллов и их перевод в «премию за
            квалификацию».
            Баллы рейтинговые – начисляются за активность на портале (за происхождение информационных и обязательных
            обучений).
        </p>
    </div>
</div>
<div class="wallet cabinet__wallet js-wallet" id="appWallet">
    <div class="wallet__tabs">
        <div class="menu-b wallet__tabs-nav">
            <div class="menu-b__inner">
                <div class="menu-b__list wallet__tabs-nav-list">
                    <button class="menu-b__item wallet__tabs-nav-item active">
                        Все
                    </button>
                    <button class="menu-b__item wallet__tabs-nav-item">
                        Баллы
                    </button>
                    <button class="menu-b__item wallet__tabs-nav-item">
                        Рубли
                    </button>
                </div>
            </div>
        </div>
        <div class="wallet__tabs-content">
            <div class="wallet__tabs-content-item active">
                <div class="transactions wallet__transactions" data-autoload="true">
                    <div class="transactions__list" v-for="item in allList">
                        <div class="transaction-mini transactions__item"
                             :class="{'transaction-mini_minus': item.direction == 'down', 'transaction-mini_plus': item.direction == 'up'}">
                            <div class="transaction-mini__grid transaction-mini__grid_1">
                                <div class="transaction-mini__grid-item transaction-mini__grid-item_1">
                                    <div class="transaction-mini__title" v-html="item.name" v-if="item.url.length < 1">
                                    </div>
                                    <a :href="item.url" class="transaction-mini__title" v-html="item.name"
                                       v-if="item.url.length > 1">
                                    </a>
                                    <div class="transaction-mini__number">
                                        <div class="transaction-mini__number-icon">
                                            <svg class="icon transaction-mini__number-icon-canvas">
                                                <use xlink:href="/assets/images/icons/icons.svg#icon-arrow-2"></use>
                                            </svg>
                                        </div>
                                        <div class="transaction-mini__number-value">
                                            +50 баллов
                                        </div>
                                    </div>
                                </div>
                                <div class="transaction-mini__grid-item transaction-mini__grid-item_2">
                                    <div class="transaction-mini__date" v-html="item.date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const appUserReg = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                componentName: '<?= $this->getComponent()->getName() ?>',
                el: document.querySelector('.js-wallet'),
                tabs: {},

                allList: {},
                roubleList: {},
                pointsList: {},
                tabActive: 'all',
                count: 20,
                allPage: 1,
                roublePage: {},
                pointsList: {},
            }
        },
        computed: {},
        watch: {},
        mounted() {
            this.init()
        },
        methods: {
            init() {
                this.getInfo()
            },
            getInfo() {
                const _this = this
                this.send('getInfo', {page: 1, count: _this.count})
                    .then(function (response) {
                        _this.errors = response.data.errors ?? response.errors ?? {}

                        if (response.data) {
                            Object.assign(_this.allList, response.data)
                        }
                    }, function (error) {
                        console.log(error)
                    })
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
    }).mount('#appWallet');
</script>