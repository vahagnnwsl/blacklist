<template>
    <div class="col-md-12">
        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="contact_person_full_name">ФИО: <span class="text-danger">*</span></label>
                    <input type="text" id="contact_person_full_name" class="form-control"
                           name="contact_person_full_name" v-model="form.contact_person_full_name" data-vv-as="ФИО"
                           v-validate="'required|max:100'">
                    <small class="text-danger" v-if="errors.has('contact_person_full_name')">{{errors.first('contact_person_full_name')}}</small>

                </div>
                <div class="form-group col-md-6">
                    <label for="contact_phone">Контактный номер телефона: <span class="text-danger">*</span></label>
                    <input type="text" id="contact_phone" class="form-control" name="contact_phone"
                           v-model="form.contact_phone" data-vv-as="Контактный номер телефона"
                           v-validate="'required|numeric'">
                    <small class="form-text text-muted text-right">С кодом города</small>
                    <small class="text-danger  float-right" v-if="errors.has('contact_phone')">{{errors.first('contact_phone')}}</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Адрес электронной почты: <span class="text-danger">*</span></label>
                    <input type="email" id="email" class="form-control" name="email" readonly v-model="form.email"
                           data-vv-as="Адрес электронной почты" v-validate="'required|email'">
                    <!--                    <small class="form-text text-muted text-right"><strong>Внимание:</strong> доступ к сервису будет предоставлен на данный адрес. Убедитесь в правильности адреса, иначе мы не сможем с вами связаться</small>-->
                    <small class="text-danger" v-if="errors.has('email')">{{errors.first('email')}}</small>

                </div>
                <div class="form-group col-md-6" v-if="auth_type!==2">
                    <label for="contact_person_position">Должность: <span class="text-danger">*</span></label>
                    <input type="text" id="contact_person_position" class="form-control" name="contact_person_position"
                           v-model="form.contact_person_position" data-vv-as="Должность"
                           v-validate="'required|max:100'">
                    <small class="text-danger" v-if="errors.has('contact_person_position')">{{errors.first('contact_person_position')}}</small>

                </div>
                <div class="form-group col-md-12">
                    <label for="about_business">Расскажите коротко о Вашем бизнесе в недвижимости: </label>
                    <textarea type="password" id="about_business" class="form-control" name="about_business"
                              v-model="form.about_business" data-vv-as="о Вашем бизнесе"
                              v-validate="'max:1500'"></textarea>
                    <small class="text-danger"
                           v-if="errors.has('about_business')">{{errors.first('about_business')}}</small>


                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-dark btn-block">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Contact",
        props: ['contact_data', 'auth_type'],
        data() {
            return {
                form: {
                    validator: 'contact',
                    contact_person_full_name: '',
                    email: '',
                    contact_phone: '',
                    contact_person_position: '',
                    about_business: ''
                }
            }
        },
        mounted() {
            this.form = this.contact_data;
        },
        methods: {
            onSubmit: function () {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post('/account/data/contact', this.form).then(() => {
                            $.toaster({ message : 'Успешно обновлено', title : 'Успешно!', priority : 'success' });
                        })
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
