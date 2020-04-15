<template>
    <div class="col-md-12 mt-3">
        <div class="row">
            <div class="col-md-12">
                <form @submit.prevent="onSubmit" class="w-100" ref="form">
                    <div class="row  mt-2">

                        <div class="form-group col-md-4">
                            <label for="last_name">Фамилия : <span class="text-danger">*</span></label>
                            <input type="text" id="last_name" class="form-control  form-control-sm" name="last_name"
                                   v-model="form.last_name"
                                   data-vv-as="Фамилия " v-validate="'required|max:100'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('last_name')">{{errors.first('last_name')}}</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="first_name">Имя : <span class="text-danger">*</span></label>
                            <input type="text" id="first_name" class="form-control  form-control-sm" name="first_name"
                                   v-model="form.first_name"
                                   data-vv-as="Имя" v-validate="'required|max:100'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('first_name')">{{errors.first('first_name')}}</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="patronymic">Отчество : <span class="text-danger">*</span></label>
                            <input type="text" id="patronymic" class="form-control  form-control-sm" name="patronymic"
                                   v-model="form.patronymic"
                                   data-vv-as="Отчество" v-validate="'required|max:100'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('patronymic')">{{errors.first('patronymic')}}</small>
                        </div>

                        <div class="form-group  col-md-4">
                            <label for="register">Прописка: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control  form-control-sm" name="register" id="register"
                                   v-model="form.register"
                                   data-vv-as="Прописка" v-validate="'required|max:200'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('register')">{{errors.first('register')}}</small>
                        </div>

                        <div class="form-group  col-md-8">
                            <label>Паспорт: <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-5 form-group">
                                    <input type="text" class="form-control  form-control-sm" name="passport_serial"
                                           id="passport_serial" v-model="form.passport_serial"
                                           data-vv-as="Серия" v-validate="'required|max:100'" placeholder="Серия">
                                    <small class="text-danger  float-right"
                                           v-if="errors.has('passport_serial')">{{errors.first('passport_serial')}}</small>
                                </div>
                                <div class="col-7 form-group">
                                    <input type="text" class="form-control  form-control-sm" name="passport_number"
                                           id="passport_number" v-model="form.passport_number"
                                           data-vv-as="Номер" v-validate="'required|max:100'" placeholder="Номер">
                                    <small class="text-danger  float-right"
                                           v-if="errors.has('passport_number')">{{errors.first('passport_number')}}</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="birth_date">Дата рождения:<span class="text-danger">*</span></label>
                            <input type="date" class="form-control  form-control-sm" name="birth_date" id="birth_date"
                                   v-model="form.birth_date"
                                   data-vv-as="Дата рождения" v-validate="'required'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('birth_date')">{{errors.first('birth_date')}}</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="contact_phone">Контактный телефон: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control  form-control-sm" name="contact_phone"
                                   id="contact_phone"
                                   v-model="form.contact_phone"
                                   data-vv-as="Контактный телефон" v-validate="'required'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('contact_phone')">{{errors.first('contact_phone')}}</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="region">Регион: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control  form-control-sm" name="region" id="region"
                                   v-model="form.region"
                                   data-vv-as="Регион" v-validate="'required'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('region')">{{errors.first('region')}}</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="city">Город: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control  form-control-sm" name="city" id="city"
                                   v-model="form.city"
                                   data-vv-as="Город" v-validate="'required'">
                            <small class="text-danger  float-right"
                                   v-if="errors.has('city')">{{errors.first('city')}}</small>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="document">Изображения:</label>
                            <input type="file" id="document" ref="document" class="form-control  form-control-sm"
                                   name="document"
                                   data-vv-as="Изображения" v-on:change="handleFileUpload()"
                                   v-validate="'ext:jpg,png,pdf,jpeg'">

                            <small class="text-danger  float-right" v-if="errors.has('document')">{{errors.first('document')}}</small>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="w-100">Тип арендатора:</label>

                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="1" v-model="form.type"
                                           name="type">Физлицо
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="2" v-model="form.type"
                                           name="type">Компания
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12 mt-2">
                            <div class="row">
                                <h5 class="text-center w-100">Добавить нарушение</h5>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Нарушение <span class="text-danger">*</span></th>
                                        <th scope="col">Статус <span class="text-danger">*</span></th>
                                        <th scope="row">Дата <span class="text-danger">*</span></th>
                                        <th scope="row">
                                            <button type="button" class="btn btn-outline-secondary btn-sm float-right"
                                                    @click="addViolationInForm">
                                                <i class="fa fa-plus" @click="addViolationInForm"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(model,key) in form.violations" :key="key">

                                        <td>
                                            <input type="text" class="form-control  form-control-sm"
                                                   :name="'violations['+key+'][description]'"
                                                   :id='"violation"+key'
                                                   data-vv-as="Нарушение" v-validate="'required'"
                                                   v-model="model.description">
                                            <small class="text-danger  float-right"
                                                   v-if="errors.has('violations['+key+'][description]')">{{errors.first('violations['+key+'][description]')}}</small>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control  form-control-sm"
                                                   :name="'violations['+key+'][status]'"
                                                   :id='"violation-status"+key'
                                                   data-vv-as="Статус нарушения" v-validate="'required'"
                                                   v-model="model.status">
                                            <small class="text-danger  float-right"
                                                   v-if="errors.has('violations['+key+'][status]')">{{errors.first('violations['+key+'][status]')}}</small>
                                        </td>
                                        <td>

                                            <input type="date" class="form-control  form-control-sm"
                                                   :name="'violations['+key+'][date]'"
                                                   :id='"violation-date"+key'
                                                   data-vv-as="Дата нарушения" v-validate="'required'"
                                                   v-model="model.date">
                                            <small class="text-danger  float-right"
                                                   v-if="errors.has('violations['+key+'][date]')">{{errors.first('violations['+key+'][date]')}}</small>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger btn-sm  float-right"
                                                    @click="removeViolationInForm(key)"><i class="fa fa-minus"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                                <small class="text-danger  float-right w-100 text-right" v-if="violationsCountError">{{violationsCountError}}</small>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button class="btn btn-dark btn-block">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>


    import axios from "axios";

    export default {
        name: "AddArendator",
        data() {
            return {
                violationsCountError: '',
                form: {
                    type: 1,
                    first_name: '',
                    last_name: '',
                    patronymic: '',
                    passport_serial: '',
                    passport_number: '',
                    inn: '',
                    contact_phone: '',
                    birth_date: '',
                    city: '',
                    region: '',
                    register: '',
                    document: '',
                    violations: [{
                        description: '',
                        date: '',
                        status: '',
                    }]
                }
            }
        },

        methods: {
            addViolationInForm: function () {

                if (this.form.violations.length > 3) {
                    return;
                }
                this.form.violations.push({
                    description: '',
                    date: '',
                    status: '',
                });

            },
            removeViolationInForm: function (index) {

                var form = this.form.violations;
                if (form.length === 1) {
                    return;
                }

                this.form.violations = form.filter(function (item, i) {
                    return i !== index;
                })

            },
            handleFileUpload: function () {
                this.form.document = this.$refs.document.files[0];
            },
            onSubmit: function () {

                this.violationsCountError = '';
                this.$validator.validate().then(valid => {

                    if (valid) {
                        if (this.form.violations.length === 0) {
                            this.violationsCountError = 'Вы должны добавить хотя бы один нарушения!';
                            return;
                        }

                        let formData = new FormData();
                        var form = this.form;

                        Object.keys(form).map(function (key, index) {
                            if (key === 'violations') {
                                formData.append(key, JSON.stringify(form[key]));
                            } else {
                                formData.append(key, form[key]);
                            }
                        });

                        axios.post('/arendator', formData, {
                            headers: {'Content-Type': 'multipart/form-data'}
                        }).then(() => {
                            $.toaster({message: 'Успешно добавлено', title: 'Успешно!', priority: 'success'});
                            this.$refs.form.reset();
                        })
                    }
                })
            }
        }

    }
</script>

<style scoped>

    #myTab a {
        color: #6C757D !important;
    }

    #myTab .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #6C757D;

        font-weight: bold;
    }


</style>
