<template>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" ref="modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center"><strong>Добавить новое арендатор</strong></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="onSubmit" class="w-100" ref="form">
                        <div class="row  justify-content-center">
                            <div class="col-9">
                                <div class="row  mt-2">
                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label class="w-100">Тип арендатора:</label>

                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" @click='formType(1)' class="form-check-input"
                                                       value="1"
                                                       v-model="form.type"
                                                       name="type">Физлицо
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" @click='formType(2)' class="form-check-input"
                                                       value="2"
                                                       v-model="form.type"
                                                       name="type">Компания
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="last_name">Фамилия : <span class="text-danger">*</span></label>
                                        <input type="text" id="last_name" class="form-control  form-control-sm"
                                               name="last_name"
                                               v-model="form.last_name"
                                               data-vv-as="Фамилия " v-validate="'required|max:100'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('last_name')">{{errors.first('last_name')}}</small>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="first_name">Имя : <span class="text-danger">*</span></label>
                                        <input type="text" id="first_name" class="form-control  form-control-sm"
                                               name="first_name"
                                               v-model="form.first_name"
                                               data-vv-as="Имя" v-validate="'required|max:100'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('first_name')">{{errors.first('first_name')}}</small>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="patronymic">Отчество : <span class="text-danger">*</span></label>
                                        <input type="text" id="patronymic" class="form-control  form-control-sm"
                                               name="patronymic"
                                               v-model="form.patronymic"
                                               data-vv-as="Отчество" v-validate="'required|max:100'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('patronymic')">{{errors.first('patronymic')}}</small>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="register">Прописка: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control  form-control-sm" name="register"
                                               id="register"
                                               v-model="form.register"
                                               data-vv-as="Прописка" v-validate="'required|max:200'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('register')">{{errors.first('register')}}</small>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="contact_phone">Контактный телефон: <span
                                            class="text-danger">*</span></label>
                                        <input type="text" class="form-control  form-control-sm" name="contact_phone"
                                               id="contact_phone"
                                               v-model="form.contact_phone"
                                               data-vv-as="Контактный телефон" v-validate="'required'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('contact_phone')">{{errors.first('contact_phone')}}</small>
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12" v-if="form_type===2">
                                        <label for="inn">ИНН: <span
                                            class="text-danger">*</span></label>
                                        <input type="text" class="form-control  form-control-sm" name="inn"
                                               id="inn"
                                               v-model="form.inn"
                                               data-vv-as="ИНН" v-validate="'required'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('inn')">{{errors.first('inn')}}</small>
                                        <small class="text-danger  float-right"
                                               v-if="backErrors.inn">{{backErrors.inn[0]}}</small>
                                    </div>
                                    <div class="form-group  col-md-8 col-lg-8  col-md-12 col-sm-12"
                                         v-if="form_type===1">
                                        <label>Паспорт: <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-5 form-group">
                                                <input type="text" class="form-control  form-control-sm"
                                                       name="passport_serial"
                                                       id="passport_serial" v-model="form.passport_serial"
                                                       data-vv-as="Серия" v-validate="'required|max:100'"
                                                       placeholder="Серия">
                                                <small class="text-danger  float-right"
                                                       v-if="errors.has('passport_serial')">{{errors.first('passport_serial')}}</small>
                                            </div>
                                            <div class="col-7 form-group">
                                                <input type="text" class="form-control  form-control-sm"
                                                       name="passport_number"
                                                       id="passport_number" v-model="form.passport_number"
                                                       data-vv-as="Номер" v-validate="'required|max:100'"
                                                       placeholder="Номер">
                                                <small class="text-danger  float-right"
                                                       v-if="errors.has('passport_number')">{{errors.first('passport_number')}}</small>
                                            </div>
                                            <div class="col-12 form-group" v-if="backErrors.passport">
                                                <small
                                                    class="text-danger  float-right">{{backErrors.passport[0]}}</small>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="birth_date">Дата рождения:<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control  form-control-sm" name="birth_date"
                                               id="birth_date"
                                               v-model="form.birth_date"
                                               data-vv-as="Дата рождения" v-validate="'required'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('birth_date')">{{errors.first('birth_date')}}</small>
                                    </div>


                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="region">Регион: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control  form-control-sm" name="region"
                                               id="region"
                                               v-model="form.region"
                                               data-vv-as="Регион" v-validate="'required'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('region')">{{errors.first('region')}}</small>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="city">Город: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control  form-control-sm" name="city" id="city"
                                               v-model="form.city"
                                               data-vv-as="Город" v-validate="'required'">
                                        <small class="text-danger  float-right"
                                               v-if="errors.has('city')">{{errors.first('city')}}</small>
                                    </div>

                                    <div class="form-group col-xl-4 col-lg-4  col-md-6 col-sm-12">
                                        <label for="document">Изображения:</label>
                                        <input type="file" id="document" ref="document"
                                               class="form-control  form-control-sm"
                                               name="document"
                                               data-vv-as="Изображения" v-on:change="handleFileUpload()"
                                               v-validate="'ext:jpg,png,pdf,jpeg'">

                                        <small class="text-danger  float-right" v-if="errors.has('document')">{{errors.first('document')}}</small>
                                    </div>


                                    <div class="form-group col-md-12 table-responsive mt-2">
                                        <h5 class="text-center w-100">Добавить нарушение</h5>

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">Нарушение <span class="text-danger">*</span></th>
                                                <th scope="col">Статус <span class="text-danger">*</span></th>
                                                <th scope="row">Дата <span class="text-danger">*</span></th>
                                                <th scope="row">
                                                    <button type="button"
                                                            class="btn btn-outline-secondary btn-sm float-right"
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
                                                    <select class="form-control form-control-sm" v-model="model.status">
                                                        :name="'violations['+key+'][status]'"
                                                        :id='"violation-status"+key' data-vv-as="Статус нарушения"
                                                        v-validate="'required'">
                                                        <option value="0">Не погашено</option>
                                                        <option value="1">Погашено</option>
                                                    </select>

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
                                                    <button type="button"
                                                            class="btn btn-outline-danger btn-sm  float-right"
                                                            @click="removeViolationInForm(key)"><i
                                                        class="fa fa-minus"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <small class="text-danger  float-right w-100 text-right"
                                               v-if="violationsCountError">{{violationsCountError}}</small>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="btn-group float-right" role="group" aria-label="Basic example">
                                            <button type="button" ref="closeModal" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Отменить
                                            </button>
                                            <button class="btn btn-dark btn-block ml-2">Сохранить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "AddArendator",
        props: ['user_id'],
        data() {
            return {
                violationsCountError: '',
                form_type: 1,
                form: {
                    type: 1,
                    first_name: '',
                    last_name: '',
                    patronymic: '',
                    contact_phone: '',
                    birth_date: '',
                    city: '',
                    region: '',
                    register: '',
                    violations: [{
                        description: '',
                        date: '',
                        status: 0
                    }],
                },
                backErrors: {}
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
                    status: 0,
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
                var self = this,
                    file = this.$refs.document.files[0],
                    reader = new FileReader();

                if (typeof file !== 'object') {
                    self.form.document = '';
                    return;
                }

                reader.onloadend = function () {
                    self.form.document = reader.result;
                };

                reader.readAsDataURL(file);

            },
            formType: function (val) {
                console.log(this.form)
                this.form_type = val;
            },
            onSubmit: function () {
                this.violationsCountError = '';
                this.backErrors = {};

                this.$validator.validate().then(valid => {

                    if (valid) {
                        if (this.form.violations.length === 0) {
                            this.violationsCountError = 'Вы должны добавить хотя бы один нарушения!';
                            return;
                        }
                        if (Number(this.form.type) === 1) {
                            delete this.form.inn;
                        } else {
                            delete this.form.passport_serial;
                            delete this.form.passport_number;
                        }

                        axios.post('/account/arendators', this.form).then(() => {

                            this.$emit('getResults', 1);
                            this.$refs.form.reset();
                            this.$refs['closeModal'].click();
                            $.toaster({message: 'Успешно добавлено', title: 'Успешно!', priority: 'success'});
                            this.clear();

                        }).catch((error) => {
                            console.log(error.response.data)
                            this.backErrors = error.response.data;
                            console.log(this.backErrors)
                        })
                    }
                })
            },

            clear: function () {
                this.form_type = 1;
                this.form.type = 1;
                this.form.first_name = '';
                this.form.last_name = '';
                this.form.patronymic = '';
                this.form.contact_phone = '';
                this.form.birth_date = '';
                this.form.city = '';
                this.form.region = '';
                this.form.register = '';
                this.form.violations = [{
                    description: '',
                    date: '',
                    status: 0
                }];
            }
        }
    }
</script>

