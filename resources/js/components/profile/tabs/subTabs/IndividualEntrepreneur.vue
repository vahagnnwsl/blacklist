<template>
    <div class="row  mt-2">
        <div class="form-group col-md-6" >
            <label for="company_name">Наименование: <span class="text-danger">*</span></label>
            <input type="text" id="company_name" class="form-control" name="company_name" v-model="form.company_name"
                   data-vv-as="Наименование" v-validate="'required|max:100'">
            <small class="text-danger  float-right"
                   v-if="errors.has('company_name')">{{errors.first('company_name')}}</small>
        </div>

        <div class="form-group  col-md-6">
            <label for="inn">ИНН: <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="inn" id="inn" v-model="form.inn"
                   data-vv-as="ИНН" v-validate="'required|max:200'">
            <small class="text-danger  float-right"
                   v-if="errors.has('inn')">{{errors.first('inn')}}</small>
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
        name: "IndividualEntrepreneur",
        data(){
            return {
                form: {
                    company_name: '',
                    contact_phone: '',
                    passport: '',
                    inn: '',
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
