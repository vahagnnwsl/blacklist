<template>
    <form @submit.prevent="onSubmit" class="w-100" ref="form">
        <div class="row  mt-2">
            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="last_name">Наименование организации: <span class="text-danger">*</span></label>
                <input type="text" id="company_name" class="form-control  form-control-sm"
                       name="company_name"
                       v-model="form.company_name"
                       data-vv-as="Наименование организации" v-validate="'required|max:100'">
                <small class="text-danger  float-right"
                       v-if="errors.has('company_name')">{{errors.first('company_name')}}</small>
            </div>

            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12" >
                <label for="inn">ИНН: <span
                    class="text-danger">*</span></label>
                <input type="number" class="form-control  form-control-sm" name="inn"
                       id="inn"
                       v-model="form.inn"
                       data-vv-as="ИНН" v-validate="'required|numeric'">
                <small class="text-danger  float-right"
                       v-if="errors.has('inn')">{{errors.first('inn')}}</small>
                <small class="text-danger  float-right"
                       v-if="backErrors.inn">{{backErrors.inn[0]}}</small>
            </div>
            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="register">Адрес юр. лица или ИП: <span class="text-danger">*</span></label>
                <input type="text" class="form-control  form-control-sm" name="address"
                       id="register"
                       v-model="form.address"
                       data-vv-as="Адрес юр лица" v-validate="'required|max:200'">
                <small class="text-danger  float-right"
                       v-if="errors.has('address')">{{errors.first('address')}}</small>
            </div>

            <div class="form-group col-12 " style="border-bottom: 1px solid lightgray">
                <h5>Контактные данные</h5>
            </div>

            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="last_name">Фамилия: <span class="text-danger">*</span></label>
                <input type="text" id="last_name" class="form-control  form-control-sm"
                       name="last_name"
                       v-model="form.last_name"
                       data-vv-as="Фамилия " v-validate="'required|max:100'">
                <small class="text-danger  float-right"
                       v-if="errors.has('last_name')">{{errors.first('last_name')}}</small>
            </div>
            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="first_name">Имя: <span class="text-danger">*</span></label>
                <input type="text" id="first_name" class="form-control  form-control-sm"
                       name="first_name"
                       v-model="form.first_name"
                       data-vv-as="Имя" v-validate="'required|max:100'">
                <small class="text-danger  float-right"
                       v-if="errors.has('first_name')">{{errors.first('first_name')}}</small>
            </div>

            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="patronymic">Отчество: <span class="text-danger">*</span></label>
                <input type="text" id="patronymic" class="form-control  form-control-sm"
                       name="patronymic"
                       v-model="form.patronymic"
                       data-vv-as="Отчество" v-validate="'required|max:100'">
                <small class="text-danger  float-right"
                       v-if="errors.has('patronymic')">{{errors.first('patronymic')}}</small>
            </div>


            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="contact_phone">Телефон: <span
                    class="text-danger">*</span></label>
                <input type="text" class="form-control  form-control-sm" name="contact_phone"
                       id="contact_phone"
                       v-model="form.contact_phone"
                       data-vv-as="Контактный телефон" v-validate="'required|numeric'">
                <small class="text-danger  float-right"
                       v-if="errors.has('contact_phone')">{{errors.first('contact_phone')}}</small>
            </div>
            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="position">Должность: <span
                    class="text-danger">*</span></label>
                <input type="text" class="form-control  form-control-sm" name="position"
                       id="position"
                       v-model="form.position"
                       data-vv-as="Должность" v-validate="'required'">
                <small class="text-danger  float-right"
                       v-if="errors.has('position')">{{errors.first('position')}}</small>
            </div>

            <div class="form-group  col-xl-6 col-lg-6  col-md-6 col-sm-12">
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




            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="region">Регион: <span class="text-danger">*</span></label>
                <input type="text" class="form-control  form-control-sm" name="region"
                       id="region"
                       v-model="form.region"
                       data-vv-as="Регион" v-validate="'required'">
                <small class="text-danger  float-right"
                       v-if="errors.has('region')">{{errors.first('region')}}</small>
            </div>

            <div class="form-group col-xl-6 col-lg-6  col-md-6 col-sm-12">
                <label for="city">Город: <span class="text-danger">*</span></label>
                <input type="text" class="form-control  form-control-sm" name="city" id="city"
                       v-model="form.city"
                       data-vv-as="Город" v-validate="'required'">
                <small class="text-danger  float-right"
                       v-if="errors.has('city')">{{errors.first('city')}}</small>
            </div>

           <ViolationFormComponent :violation="form.violation" ></ViolationFormComponent>

            <div class="form-group col-md-12">
                <div class="btn-group float-right" role="group" aria-label="Basic example">
                    <button type="button" ref="closeModal" class="btn btn-outline-secondary"
                            data-dismiss="modal">Отменить
                    </button>
                    <button class="btn btn-dark btn-block ml-2">Сохранить</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>

    import ViolationFormComponent from "./ViolationFormComponent";

    export default {
        name: "EntrepreneurArendatorFormComponent",
        props: ['user_id'],
        components: {ViolationFormComponent},
        data() {
            return {
                violationsCountError: '',
                form: {
                    type: 2,
                    inn: '',
                    company_name: '',
                    first_name: '',
                    last_name: '',
                    patronymic: '',
                    contact_phone: '',
                    passport_serial: '',
                    passport_number: '',
                    position: '',
                    city: '',
                    region: '',
                    address: '',
                    violation: {
                        description: '',
                        document: '',
                        date: '',
                        status: 0
                    },
                },
                backErrors: {}
            }
        },

        methods: {



            onSubmit: function () {
                this.violationsCountError = '';
                this.backErrors = {};

                this.$validator.validate().then(valid => {

                    if (valid) {

                        axios.post('/account/arendators', this.form).then((resp) =>
                        {

                            $.toaster({message:  resp.data.msg, title: 'Успешно!', priority: 'success'});
                            this.clear();
                            this.$validator.reset();

                        }).catch((error) => {
                            this.backErrors = error.response.data;
                        })
                    }
                })
            },

            clear: function () {
                this.form = {
                    type: 2,
                    inn: '',
                    company_name: '',
                    first_name: '',
                    last_name: '',
                    patronymic: '',
                    contact_phone: '',
                    passport_serial: '',
                    passport_number: '',
                    position: '',
                    city: '',
                    region: '',
                    address: '',
                    violation: {
                        description: '',
                        document: '',
                        date: '',
                        status: 0
                    },
                }
            }
        }
    }

</script>

<style scoped>

</style>
