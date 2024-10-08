<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */
\Bitrix\Main\UI\Extension::load('ui.vue3');
?>
<div id="app-elements_list_<?= $arResult['BLOCK_ID'] ?>" class="section section_margin-1 posts js-posts">
    <div class="section__header posts__header" v-if="list.length > 0">
        <div class="section__grid section__grid_1">
            <div class="section__grid-item section__grid-item_1">
                <h2 class="title section__title posts__title">
                    <?=$arParams['BLOCK_TITLE']?>
                </h2>
            </div>
            <div class="section__grid-item section__grid-item_2">
                <a href="<?=$arParams['LINK_MORE']?>"
                   class="link link_type-1 link_color-1 section__button section__button_more posts__button">
                    Смотреть все
                </a>
            </div>
        </div>
    </div>
    <div class="section__swiper-outer swiper-outer posts__swiper-outer" v-if="list.length > 0">
        <div class="section__swiper swiper posts__swiper">
            <div class="section__grid section__grid_2 swiper-wrapper posts__swiper-wrapper">
                <div class="section__grid-item swiper-slide" v-for="item in list">
                    <a :href="item.DETAIL_PAGE_URL" class="post-mini" :class="item.section.FIRST.UF_BACKGROUND ?? ''">
                        <div class="post-mini__head">
                            <div class="post-mini__icon">
                                <svg class="icon post-mini__icon-canvas">
                                    <use v-bind="{'xlink:href':'/assets/images/icons/icons.svg#'+ item.section.FIRST.UF_PICT ?? ''}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="post-mini__data">
                            <div class="post-mini__title" v-html="item.NAME">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-button swiper-button-prev swiper-button-lock">
            <svg class="icon swiper-button-icon">
                <use xlink:href="/assets/images/icons/icons.svg#icon-arrow-1"></use>
            </svg>
        </div>
        <div class="swiper-button swiper-button-next swiper-button-lock">
            <svg class="icon swiper-button-icon">
                <use xlink:href="/assets/images/icons/icons.svg#icon-arrow-1"></use>
            </svg>
        </div>
    </div>
</div>

<script>
    const appElementsList_<?=$arResult['BLOCK_ID']?> = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                componentName: '<?= $this->getComponent()->getName() ?>',
                arParams: <?= CUtil::PhpToJSObject($arParams)?>,
                list: {},
            }
        },
        computed: {
            isChecked() {
                return this.isExperienced == 1
            }
        },
        watch: {},
        mounted() {
            this.getList()
        },
        methods: {
            getList() {
                const _this = this

                _this.send('getList')
                    .then(function (response) {
                        if (response.status === 'success') {
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

                params.data = {arParams: _this.arParams};

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
    }).mount('#app-elements_list_<?=$arResult['BLOCK_ID']?>');
</script>