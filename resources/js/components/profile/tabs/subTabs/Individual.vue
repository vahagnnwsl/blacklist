<template>
    <div class="row  mt-2">
        <div class="form-group col-md-6" >
            <label for="full_name">ФИО: <span class="text-danger">*</span></label>
            <input type="text" id="full_name" class="form-control" name="full_name" v-model="form.full_name"
                   data-vv-as="ФИО" v-validate="'required|max:100'">
            <small class="text-danger  float-right"
                   v-if="errors.has('full_name')">{{errors.first('full_name')}}</small>
        </div>
        <div class="form-group  col-md-6">
            <label for="register">Прописка: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="register" id="register" v-model="form.register"
                   data-vv-as="Прописка" v-validate="'required|max:200'">
            <small class="text-danger  float-right"
                   v-if="errors.has('register')">{{errors.first('register')}}</small>
        </div>
        <div class="form-group  col-md-6">
            <label for="inn">ИНН: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="inn" id="inn" v-model="form.inn"
                   data-vv-as="ИНН" v-validate="'required|max:200'">
            <small class="text-danger  float-right"
                   v-if="errors.has('inn')">{{errors.first('inn')}}</small>
        </div>
        <div class="form-group  col-md-6">
            <label for="passport">Паспорт: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="passport" id="passport" v-model="form.passport"
                   data-vv-as="Паспорт" v-validate="'required|max:100'">
            <small class="text-danger  float-right"
                   v-if="errors.has('passport')">{{errors.first('passport')}}</small>
        </div>
        <div class="form-group col-md-6">
            <label for="birth_date">Дата рождения: </label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" v-model="form.birth_date"
                   data-vv-as="Дата рождения" v-validate="'required'">
            <small class="text-danger  float-right"
                   v-if="errors.has('birth_date')">{{errors.first('birth_date')}}</small>
        </div>
        <div class="form-group col-md-6">
            <label for="contact_phone">Контактный телефон: </label>
            <input type="text" class="form-control" name="contact_phone" id="contact_phone" v-model="form.contact_phone"
                   data-vv-as="Контактный телефон" v-validate="'required'">
            <small class="text-danger  float-right"
                   v-if="errors.has('contact_phone')">{{errors.first('contact_phone')}}</small>
        </div>

        <div class="form-group col-md-6">
            <label for="city">Город: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="city" id="city" v-model="form.city"
                   data-vv-as="Город" v-validate="'required'">
            <small class="text-danger  float-right"
                   v-if="errors.has('city')">{{errors.first('city')}}</small>
        </div>
        <div class="form-group col-md-6">
            <label for="disturbance">Нарушение: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="disturbance" id="disturbance" v-model="form.disturbance"
                   data-vv-as="Нарушение" v-validate="'required'">
            <small class="text-danger  float-right"
                   v-if="errors.has('disturbance')">{{errors.first('disturbance')}}</small>
        </div>

        <div class="form-group col-md-6">
            <label for="disturbance">Дата нарушения: <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="disturbance_date" id="disturbance_date" v-model="form.disturbance_date"
                   data-vv-as="Дата нарушения" v-validate="'required'">
            <small class="text-danger  float-right"
                   v-if="errors.has('disturbance_date')">{{errors.first('disturbance_date')}}</small>
        </div>
        <div class="form-group col-md-12">
            <button class="btn btn-dark btn-block">Сохранить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Individual",
        data(){
            return {
                form: {
                    full_name: '',
                    passport: '',
                    inn: '',
                    contact_phone: '',
                    birth_date: '',
                    city: '',
                    disturbance: '',
                    disturbance_date: '',
                    register: '',
                }
            }
        }
    }
</script>

<style scoped>

</style>
