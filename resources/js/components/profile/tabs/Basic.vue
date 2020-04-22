<template>
    <div class="col-md-12">
        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row">
                <div class="form-group col-md-6" v-if="auth_type===2">
                    <label for="full_name">ФИО: <span class="text-danger">*</span></label>
                    <input type="text" id="full_name" class="form-control" name="full_name" v-model="form.full_name"
                           data-vv-as="ФИО" v-validate="'required|max:100'">
                    <small class="text-danger  float-right"
                           v-if="errors.has('full_name')">{{errors.first('full_name')}}</small>

                </div>
                <div class="form-group col-md-6"  v-if="auth_type!==2">
                    <label for="company_name">Наименование: <span class="text-danger">*</span></label>
                    <input type="text" id="company_name" class="form-control" name="company_name" v-model="form.company_name"
                           data-vv-as="Наименование" v-validate="'required|max:100'">
                    <small class="text-danger  float-right"
                           v-if="errors.has('company_name')">{{errors.first('company_name')}}</small>

                </div>

                <div class="form-group col-md-6" v-if="auth_type===3">
                    <label for="psrn">ОГРН: <span class="text-danger">*</span></label>
                    <input type="text" id="psrn" class="form-control" name="psrn" v-model="form.psrn" data-vv-as="ОГРН"
                           v-validate="'required|max:100'">
                    <p class="text-danger  float-right" v-if="errors.has('psrn')">{{errors.first('psrn')}}</p>

                </div>

                <div class="form-group col-md-6" v-if="auth_type===4">
                    <label for="psrnie">ОГРНИП: <span class="text-danger">*</span></label>
                    <input type="text" id="psrnie" class="form-control" name="psrnie" v-model="form.psrnie"
                           data-vv-as="ОГРНИП" v-validate="'required|max:100'">
                    <small class="text-danger  float-right"
                           v-if="errors.has('psrnie')">{{errors.first('psrnie')}}</small>

                </div>
                <div class="form-group col-md-6" v-if="auth_type!==2">
                    <label for="brand">Торговая марка,бренд название: <span class="text-danger">*</span></label>
                    <input type="text" id="brand" class="form-control" name="brand" v-model="form.brand"
                           data-vv-as="Торговая марка,бренд название" v-validate="'required|max:100'">
                    <small class="text-danger  float-right" v-if="errors.has('brand')">{{errors.first('brand')}}</small>

                </div>

                <div class="form-group col-md-6" v-if="auth_type===2">
                    <label for="inn">ИНН: </label>
                    <input type="text" id="inn" class="form-control" name="inn" v-model="form.inn" data-vv-as="ИНН"
                           v-validate="'max:100'">
                    <small class="text-danger  float-right" v-if="errors.has('inn')">{{errors.first('inn')}}</small>
                </div>
                <div class="form-group col-md-6" v-else>
                    <label for="inn">ИНН: <span class="text-danger">*</span></label>
                    <input type="text" id="inn" class="form-control" name="inn" v-model="form.inn" data-vv-as="ИНН"
                           v-validate="'required|max:100'">
                    <small class="text-danger  float-right" v-if="errors.has('inn')">{{errors.first('inn')}}</small>
                </div>

                <div class="form-group col-md-6">
                    <label for="country">Страна: <span class="text-danger">*</span></label>
                    <input type="text" id="country" class="form-control" name="country" v-model="form.country"
                           data-vv-as="Страна" v-validate="'required|max:100'">
                    <small class="text-danger  float-right"
                           v-if="errors.has('country')">{{errors.first('country')}}</small>

                </div>
                <div class="form-group col-md-6">
                    <label for="city">Город: <span class="text-danger">*</span></label>
                    <input type="text" id="city" class="form-control" name="city" v-model="form.city" data-vv-as="Город"
                           v-validate="'required|max:100'">
                    <small class="text-danger  float-right" v-if="errors.has('city')">{{errors.first('city')}}</small>

                </div>
                <div class="form-group col-md-6" v-if="auth_type===2">
                    <label for="passport">Паспорт: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="passport" id="passport" v-model="form.passport"
                           data-vv-as="Паспорт" v-validate="'required|max:100'">
                    <small class="text-danger  float-right"
                           v-if="errors.has('passport')">{{errors.first('passport')}}</small>

                </div>

                <div class="form-group col-md-6">
                    <label for="address">Адрес офиса (если есть): </label>
                    <input type="text" class="form-control" name="address" id="address" v-model="form.address"
                           data-vv-as="Адрес офиса (если есть)" v-validate="'max:100'">
                    <small class="form-text text-muted text-right">Улица, дом, офис</small>
                    <small class="text-danger  float-right"
                           v-if="errors.has('address')">{{errors.first('address')}}</small>


                </div>

                <div class="form-group col-md-6">
                    <label for="advertising_number">Рекламный номер по вопросу аренды: </label>
                    <input type="text" class="form-control" id="advertising_number"
                           data-vv-as="Рекламный номер по вопросу аренды" name="advertising_number"
                           v-model="form.advertising_number" v-validate="'max:100'">
                    <small class="form-text text-muted text-right">С кодом города, по одному в строке</small>
                    <small class="text-danger  float-right" v-if="errors.has('advertising_number')">
                        {{errors.first('advertising_number')}}</small>

                </div>

                <div class="form-group col-md-6" v-if="auth_type!==2">
                    <label for="document">Подтверждающие документы: <span class="text-danger">*</span></label>
                    <input type="file" id="document" ref="document" class="form-control" name="document"
                           data-vv-as="Подтверждающие документы" v-on:change="handleFileUpload()"
                           v-validate="'ext:jpg,png,pdf,jpeg,gif,tiff|size:7000'">
                    <small class="form-text text-muted text-right">Свидетельство индивидуального предпринимателя в
                        ЕГРИП, о постановке на налоговый учет (с ИНН)</small>
                    <small class="text-danger  float-right"
                           v-if="errors.has('document')">{{'Тип загруженного файла не поддерживается. Загрузите, пожалуйста, jpg, gif, tiff или pdf файл.'}}</small>

                    <a  v-if='' :href="doc" target="_blank" class="float-right text-secondary"><strong>Документ</strong></a>
                </div>

                <div class="form-group col-md-6">
                    <label for="web_site">Адрес сайта или соцсети: </label>
                    <input type="text" class="form-control" name="web_site" id="web_site" v-model="form.web_site"
                           data-vv-as="Адрес сайта или соцсети" v-validate="'url|max:100'">
                    <small
                        class="form-text text-muted text-right"><strong>Пример: </strong>https://www.твой-сайт.ru</small>
                    <small class="text-danger  float-right"
                           v-if="errors.has('web_site')">{{errors.first('web_site')}}</small>

                </div>

                <div class="form-group col-md-6">
                    <label for="real_estate_count">Количество объектов недвижимость: <span class="text-danger">*</span></label>
                    <input type="number" min="1" id="real_estate_count" class="form-control"
                           data-vv-as="Количество объектов недвижимость" name="real_estate_count"
                           v-model="form.real_estate_count" v-validate="'between:1,10000'">
                    <small class="form-text text-muted text-right">в собственности или управлении</small>
                    <small class="text-danger  float-right" v-if="errors.has('real_estate_count')">
                        {{errors.first('real_estate_count')}}</small>
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-dark btn-block">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Basic",
        props: ['basic_data','auth_type'],
        data() {
            return {
                form: {
                    inn: '',
                    city: '',
                    country: '',
                    passport: '',
                    company_name: '',
                    address: '',
                    advertising_number: '',
                    psrnie: '',
                    web_site: '',
                    real_estate_count: '',
                    psrn: '',
                    brand: '',
                    full_name: '',
                    document: '',
                },
                doc: '',
            }
        },
        mounted() {
            this.form = this.basic_data;
            this.doc = this.basic_data.doc;

        },
        methods: {
            onSubmit: function () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        let formData = new FormData();
                        var form = this.form;

                        Object.keys(form).map(function (key, index) {
                            formData.append(key, form[key]);
                        });

                        axios.post('/account/data/basic', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then((resp) => {
                            $.toaster({ message : 'Успешно обновлено', title : 'Успешно!', priority : 'success' });
                            this.doc = resp.data.doc;
                        })
                    }
                })
            },
            handleFileUpload: function () {
                this.form.document = this.$refs.document.files[0];
            }
        }

    }
</script>

<style scoped>

</style>
