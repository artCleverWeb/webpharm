<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}


/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */

\Bitrix\Main\UI\Extension::load('ui.vue3');
?>

<div class="sidebar js-sidebar" id="app-user-profile">
    <div class="sidebar__background"></div>
    <div class="sidebar__data">
        <div class="section user-mini user-mini_sidebar sidebar__user">
            <a href="#" class="user-mini__picture">
                <img :src="userInfo.pict" alt="" class="user-mini__picture-img">
            </a>
            <div class="user-mini__data">
                <a href="#" class="user-mini__name" v-html="userInfo.name">
                    <?= $arResult['name'] ?>
                </a>
            </div>
            <div class="dropdown user-mini__dropdown">
                <div class="user-mini__menu">
                    <div class="user-mini__menu-list">
                        <div class="user-mini__menu-item">
                            <a href="/personal/" class="user-mini__menu-item-link">
                                Личный кабинет
                            </a>
                        </div>
                        <div class="user-mini__menu-item">
                            <a href="/pages/user_agreements.html" class="user-mini__menu-item-link">
                                Пользовательское соглашение
                            </a>
                        </div>
                        <div class="user-mini__menu-item">
                            <a href="/pages/conf_policies.html" class="user-mini__menu-item-link">
                                Политика конфиденциальности
                            </a>
                        </div>
                        <div class="user-mini__menu-item user-mini__menu-item_logout">
                            <a href="/?logout=yes" class="user-mini__menu-item-link">
                                Выйти
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="notices notices_sidebar sidebar__notices">
            <div class="notices user-mini__notices">
                <div class="notices__icon">
                    <svg class="icon notices__icon-canvas">
                        <use xlink:href="/assets/images/icons/icons.svg#icon-bell"></use>
                    </svg>
                    <div class="notices__indicator" v-if="stateNotification"></div>
                </div>
                <div class="dropdown notices__dropdown" v-if="list.length > 0">
                    <div class="notices__head">
                        Требует прохождения
                    </div>
                    <div class="notices__list" v-for="item in list">
                        <a :href="item.link" class="notices__item" :class="item.isRead == '0' ? 'is-read' : ''"
                           v-if="item.link" :data-id="item.noticeId">
                            <div class="notices__item-title" v-html="item.fullText">
                            </div>
                            <div class="notices__item-date" v-html="item.descr">
                            </div>
                        </a>
                        <span class="notices__item" :class="item.isRead == '0' ? 'is-read' : ''" v-else
                              :data-id="item.noticeId">
                            <div class="notices__item-title" v-html="item.fullText">
                            </div>
                            <div class="notices__item-date" v-html="item.descr">
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="section summary summary_sidebar sidebar__summary">
            <div class="section__header summary__header u-md-hidden">
                <div class="title section__title summary__title">
                    Обзор
                </div>
            </div>
            <div class="summary__grid summary__grid_1">
                <div class="summary__grid-item">
                    <a href="#" class="item-mini-a">
                        <div class="item-mini-a__icon item-mini-a__icon_bg-3">
                            <svg class="icon item-mini-a__icon-canvas">
                                <use xlink:href="/assets/images/icons/icons.svg#icon-study"></use>
                            </svg>
                        </div>
                        <div class="item-mini-a__title">
                            Карьера
                        </div>
                        <div class="item-mini-a__number">
                            4
                        </div>
                    </a>
                </div>
                <div class="summary__grid-item">
                    <a href="#" class="item-mini-a">
                        <div class="item-mini-a__icon item-mini-a__icon_bg-4">
                            <svg class="icon item-mini-a__icon-canvas">
                                <use xlink:href="/assets/images/icons/icons.svg#icon-smile"></use>
                            </svg>
                        </div>
                        <div class="item-mini-a__title">
                            Мы заботимся о вас
                        </div>
                        <div class="item-mini-a__number">
                            5
                        </div>
                    </a>
                </div>
                <div class="summary__grid-item">
                    <a href="#" class="item-mini-a">
                        <div class="item-mini-a__icon item-mini-a__icon_bg-5">
                            <svg class="icon item-mini-a__icon-canvas">
                                <use xlink:href="/assets/images/icons/icons.svg#icon-calendar"></use>
                            </svg>
                        </div>
                        <div class="item-mini-a__title">
                            Будущих событий
                        </div>
                        <div class="item-mini-a__number">
                            5
                        </div>
                    </a>
                </div>
                <div class="summary__grid-item">
                    <a href="#" class="item-mini-a">
                        <div class="item-mini-a__icon item-mini-a__icon_bg-2">
                            <svg class="icon item-mini-a__icon-canvas">
                                <use xlink:href="/assets/images/icons/icons.svg#icon-cup"></use>
                            </svg>
                        </div>
                        <div class="item-mini-a__title">
                            Ваш рейтинг
                        </div>
                        <div class="item-mini-a__number">
                            5
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="section progress progress_sidebar sidebar__progress">
            <div class="progress__scale">
                <svg width="250" height="250" viewBox="0 0 250 250" class="progress__scale-canvas"
                     style="--progress-value: 75; --progress-color: #3BB35D;">
                    <circle class="progress__scale-canvas-bg"></circle>
                    <circle class="progress__scale-canvas-fg"></circle>
                    <!-- Если < 0, то не выводим элемент с классом "progress__scale-canvas-fg" -->
                </svg>
                <div class="progress__scale-value">
                    75%
                </div>
            </div>
            <div class="progress__title">
				<span class="progress__title-text">
					Изучено для опытных сотрудников
				</span>
                <span class="tooltip progress__title-tooltip" data-tippy-content="Изучено для опытных сотрудников">
					<svg class="icon tooltip__icon"><use
                                xlink:href="/assets/images/icons/icons.svg#icon-info"></use></svg>
				</span>
            </div>
        </div>
        <div class="section events events_sidebar sidebar__events">
            <div class="section__header events__header">
                <div class="section__grid section__grid_1">
                    <div class="section__grid-item section__grid-item_1">
                        <div class="title section__title">
                            Ближайшее событие
                        </div>
                    </div>
                    <div class="section__grid-item section__grid-item_2">
                        <a href="#"
                           class="link link_type-1 link_color-1 section__button section__button_more posts__button">
                            Смотреть все
                        </a>
                    </div>
                </div>
            </div>
            <div class="events__grid events__grid_1">
                <div class="events__grid-item">
                    <a href="#" class="post-mini-a">
                        <div class="post-mini-a__title">
                            Базовая поддержка организма в летний период вместе с брендом Nature’s Bounty (Нэйчес Баунти)
                        </div>
                        <div class="post-mini-a__person">
                            <div class="post-mini-a__person-picture">
                                <img src="/assets/upload/images/1-1.png" alt="" class="post-mini-a__person-picture-img">
                            </div>
                            <div class="post-mini-a__person-data">
                                <div class="post-mini-a__person-name">
                                    Петр Крапоткин
                                </div>
                            </div>
                        </div>
                        <div class="post-mini-a__info">
                            <div class="post-mini-a__info-item post-mini-a__info-item_date">
                                14 июля 12:00
                            </div>
                            <div class="post-mini-a__info-item post-mini-a__info-item_type">
                                Онлайн
                            </div>
                        </div>
                        <div class="post-mini-a__button-arrow">
                            <svg class="icon post-mini-a__button-arrow-icon">
                                <use xlink:href="/assets/images/icons/icons.svg#icon-arrow-1"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const appUserProfile = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                componentName: '<?= $this->getComponent()->getName() ?>',
                userInfo: <?= CUtil::PhpToJSObject($arResult['USER_INFO'])?>,
                list: {},
                stateNotification: false,
            }
        },
        computed: {},
        watch: {},
        mounted() {
            this.getNoticeList()
        },
        methods: {
            getNoticeList() {
                const _this = this

                _this.send('getNoticeList')
                    .then(function (response) {
                        if (response.status === 'success') {
                            _this.stateNotification = response.data.status == true
                            _this.list = response.data.list || {}
                        }
                    }, function (error) {
                        console.log(error)
                    })
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
    }).mount('#app-user-profile');
    ;
</script>