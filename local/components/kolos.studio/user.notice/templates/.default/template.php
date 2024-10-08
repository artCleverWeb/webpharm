<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}


/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */

\Bitrix\Main\UI\Extension::load('ui.vue3');
?>

<div class="notices notices_navbar navbar__notices" id="app-user-notice">
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
            <a :href="item.link" class="notices__item" :class="item.isRead == '0' ? 'is-read' : ''" v-if="item.link" :data-id="item.noticeId">
                <div class="notices__item-title" v-html="item.fullText">
                </div>
                <div class="notices__item-date"  v-html="item.descr">
                </div>
            </a>
            <span class="notices__item" :class="item.isRead == '0' ? 'is-read' : ''" v-else :data-id="item.noticeId">
                <div class="notices__item-title" v-html="item.fullText">
                </div>
                <div class="notices__item-date"  v-html="item.descr">
                </div>
            </span>
        </div>
    </div>
</div>

<script>
    const appUserNotice = BX.Vue3.BitrixVue.createApp({
        data() {
            return {
                componentName: '<?= $this->getComponent()->getName() ?>',
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
    }).mount('#app-user-notice');
    ;
</script>