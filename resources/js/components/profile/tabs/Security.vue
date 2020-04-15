<template>
    <div class="col-md-12">
        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="currentPassword">Текущий пароль: <span class="text-danger">*</span></label>
                    <input type="password" id="currentPassword" class="form-control" name="current_password"
                           data-vv-as="Текущий пароль" v-model="form.current_password" v-validate="'required'">
                    <small class="text-danger float-right" v-if="errors.has('current_password')">{{errors.first('current_password')}}</small>
                    <small class="text-danger float-right" v-if="backError">{{backError}}</small>

                </div>
                <div class="form-group col-md-6">
                    <label for="password">Новый пароль: <span class="text-danger">*</span></label>
                    <input type="password" id="password" class="form-control" ref="password" name="password"
                           v-model="form.password" data-vv-as="Новый пароль" v-validate="'required|max:100|min:8'">
                    <small class="form-text text-muted text-right">Минимум 8 знаков</small>
                    <small class="text-danger float-right"
                           v-if="errors.has('password')">{{errors.first('password')}}</small>

                </div>
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Подтверждение нового пароля: <span
                        class="text-danger">*</span></label>
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                           data-vv-as="Подтверждение нового пароля" v-model="form.password_confirmation"
                           v-validate="'required|confirmed:password'">
                    <small class="text-danger  float-right" v-if="errors.has('password_confirmation')">{{errors.first('password_confirmation')}}</small>

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
        name: "Security",
        data() {
            return {
                form: {
                    current_password: '',
                    password: '',
                    password_confirmation: '',
                },
                backError: ''
            }
        },
        methods: {
            onSubmit: function () {
                this.backError = '';
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post('/account/password', this.form).then(() => {
                            $.toaster({ message : 'Успешно обновлено', title : 'Успешно!', priority : 'success' });
                        }).catch(error => {
                            this.backError = error.response.data.error;
                        })
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
