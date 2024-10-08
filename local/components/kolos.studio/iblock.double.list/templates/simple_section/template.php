<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */
\Bitrix\Main\UI\Extension::load('ui.vue3');
?>
<div class="section__part" id="app-elements_list_<?= $arResult['BLOCK_ID'] ?>">
    <div class="section__header posts__header">
        <h2 class="title section__title posts__title">
            Все курсы
        </h2>
    </div>
    <div class="section__grid section__grid_3">
        <div class="section__grid-item" v-for="section in sections" :class="section.UF_BACKGROUND ?? ''">
            <a :href="section.SECTION_PAGE_URL" class="post-mini-b post-mini-b_category">
                <div class="post-mini-b__picture">
                    <svg class="icon post-mini-b__picture-icon"><use xlink:href="/assets/images/icons/icons.svg#icon-folder"></use></svg>
                </div>
                <div class="post-mini-b__data">
                    <div class="post-mini-b__title" v-html="section.NAME">
                    </div>
                </div>
                <button class="post-mini-b__button-arrow">
                    <svg class="icon post-mini-b__button-arrow-icon"><use xlink:href="/assets/images/icons/icons.svg#icon-arrow-1"></use></svg>
                </button>
            </a>
        </div>
        <div class="section__grid-item" v-for="item in list">
            <a :href="item.DETAIL_PAGE_URL" class="post-mini-b" :class="item.section.FIRST.UF_BACKGROUND ?? ''">
                <div class="post-mini-b__data">
                    <div class="post-mini-b__title" v-html="item.NAME">
                    </div>
                    <div class="post-mini-b__type" v-html="item.PREVIEW_TEXT">
                    </div>
                    <div class="post-mini-a__info">
                        <div class="post-mini-a__info-item post-mini-a__info-item_category"
                             v-html="item.section.CURRENT_SECTION.NAME ?? ''">
                        </div>
                        <div class="post-mini-a__info-item post-mini-a__info-item_time"
                             v-html="item.props.DURATION.VALUE ? item.props.DURATION.VALUE + ' мин' : ''">
                        </div>
                    </div>
                </div>
                <button class="post-mini-b__button-arrow">
                    <svg class="icon post-mini-b__button-arrow-icon"><use xlink:href="/assets/images/icons/icons.svg#icon-arrow-1"></use></svg>
                </button>
            </a>
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
                sections: {},
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
                            _this.sections = response.data.sections || {}
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