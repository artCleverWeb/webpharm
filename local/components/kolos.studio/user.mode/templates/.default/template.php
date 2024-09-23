<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}


/** @var array $arResult */
/** @var array $arParams */
/** @global CMain $APPLICATION */

\Bitrix\Main\UI\Extension::load('ui.vue3');
?>

<div class="navbar__footer" id="app-user-experienced">
    <label class="input-button-a navbar__option">
        <input type="checkbox" class="input-button-a__input" :checked="isChecked" @change="saveState($event.target.checked)"/>
        <span class="input-button-a__icon"></span>
        <span class="input-button-a__text">
            Опытный сотрудник
        </span>
    </label>
</div>
<script>
    const appUserExperienced = BX.Vue3.BitrixVue.createApp({
        data(){
            return {
                componentName: '<?= $this->getComponent()->getName() ?>',
                isExperienced: <?= $arResult['is_experienced']?>,
            }
        },
        computed: {
            isChecked(){
                return this.isExperienced == 1
            }
        },
        watch: {},
        mounted(){
        },
        methods:{
            getState(){
                const _this = this

                _this.send('getState')
                    .then(function (response) {
                        if (response.status === 'success') {
                            _this.isExperienced = response.data.is_experienced
                        }
                    }, function (error) {
                        console.log(error)
                    })
            },
            saveState(stateValue){
                const _this = this

                _this.send('saveState', {state: stateValue ? 1 : 0})
                    .then(function (response) {
                        if (response.status === 'success' && response.data.status) {
                            window.location.reload();
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
        created(){},
    }).mount('#app-user-experienced');;
</script>