<template>
    <div class="col-12 mt-3">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#myModal">
                    ДОБАВИТЬ АРЕНДАТОРА
                </button>

                <NewArendator @getResults="getResults"></NewArendator>
            </div>
            <div class="col-md-12 mt-4" v-if="laravelData.data">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ФИО:</th>
                        <th>АДРЕС</th>
                        <th>ДАТА ДОБАВЛЕНИЯ</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="arendator in laravelData.data" :key="arendator.id">
                        <td>{{foolName(arendator)}}</td>
                        <td>{{address(arendator)}}</td>
                        <td>{{date(arendator.created_at)}}</td>
                        <th>
                            <button class="btn btn-outline-secondary float-right  btn-sm"
                                    @click="openModal(arendator.id)"><i class="fa fa-eye"></i>
                            </button>
                        </th>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-12 d-flex">
                <div class="mx-auto">
                    <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
                </div>
            </div>

            <template>
                <div class="modal fade" id="arendatorModal" tabindex="-1" role="dialog" aria-hidden="true"
                     ref="arendatorModal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title w-100 text-left"><strong>{{arendator.full_name}}</strong></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-12">

                                        <h5 v-if="arendator.register">
                                            <strong>Прописка:</strong><br>
                                            <small>
                                                {{arendator.register}}
                                            </small>
                                        </h5>

                                        <h5 class="mt-3" v-if="arendator.company_name">
                                            <strong>Наименование организации:</strong><br>
                                            <small>
                                                {{arendator.company_name}}
                                            </small>
                                        </h5>

                                        <h5 class="mt-3" v-if="arendator.inn">
                                            <strong>ИНН:</strong><br>
                                            <small>
                                                {{arendator.inn}}
                                            </small>
                                        </h5>

                                        <h5 class="mt-3">
                                            <strong>Паспорт:</strong><br>
                                            <small>
                                                {{arendator.passport}}
                                            </small>
                                        </h5>

                                        <h5 class="mt-3">
                                            <strong>Телефон:</strong><br>
                                            <small>
                                                {{arendator.contact_phone}}
                                            </small>
                                        </h5>

                                        <h5 class="mt-3" v-if="arendator.address">
                                            <strong>Адрес :</strong><br>
                                            <small>
                                                {{arendator.address}}
                                            </small>
                                        </h5>

                                        <h5 class="mt-3" v-if="arendator.birth_date">
                                            <strong>Дата рождения:</strong><br>
                                            <small>
                                                {{arendator.birth_date}}
                                            </small>
                                        </h5>

                                    </div>
                                    <div class="col-lg-9 col-sm-12">
                                        <div class="row" v-for="(violation,key) in arendator.violations" style="border-bottom: 1px solid lightgray">
                                            <h5 class="mt-3 p-1 w-100" >
                                                <i>{{violation.full_name}}</i> <small><i>{{violation.date}}</i></small><br>
                                                <small >
                                                    {{violation.description}}
                                                </small><br>
                                                <a v-if="violation.document" :href="'/storage'+violation.document" target="_blank"
                                                   class="float-right text-secondary"><small><strong><i>Документ</i></strong></small></a>
                                            </h5>
                                            <div class="form-group" v-if="violation.user_id===user_id">

                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" :id="'switch'+key" :checked="Number(violation.status)===1" @change="updateStatus(violation.id,'switch'+key+violation.id)">
                                                    <label class="custom-control-label" :for="'switch'+key" :ref="'switch'+key+violation.id">
                                                        {{Number(violation.status)===1 ? 'Погашено': 'Не погашено'}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

        </div>
    </div>

</template>

<script>


    import axios from "axios";
    import NewArendator from "../modals/NewArendator";
    import Pagination from "laravel-vue-pagination";


    export default {
        name: "AddArendator",
        components: {NewArendator, Pagination},
        props: ['user_id'],
        data() {
            return {
                showModal: false,
                laravelData: {},
                violations: {},
                arendator: {}
            }
        },
        mounted() {
            this.getResults();
            this.$on("getResult", function (arg) {
                this.getResults();
            })

        },

        methods: {

            date: function(dt){

                var date = new Date(dt);
                return  date.getDate()+ "/" +  (date.getMonth() + 1)  +"/"+ date.getFullYear();
            },

            openModal: function (id) {
                axios.get('/account/arendators/' + id).then((resp) => {
                    this.arendator = resp.data;
                    $(this.$refs.arendatorModal).modal('show');
                })
            },

            getResults: function (page = 1) {
                axios.get('/account/arendators/?page=' + page).then((resp) => {

                    this.laravelData = resp.data

                })
            },

            updateStatus: function(violationId,ref){

                axios.post('/account/violations/'+violationId).then((resp) => {
                    $(this.$refs[ref]).text(resp.data.text);
                    console.log();
                    $.toaster({message: 'Успешно обновлено', title: 'Успешно!', priority: 'success'});
                })
            },

            foolName: function (arendator) {
                return arendator.first_name + ' ' + arendator.last_name + ' ' + arendator.patronymic;
            },

            address: function (arendator) {
                var address = arendator.region + ' ' + arendator.city;
                if (arendator.address) {
                    address += ' ' + arendator.address
                }
                return address;
            },

            type: function (arendator) {
                if (Number(arendator.type) === 1) {
                    return 'Физлицо';
                }
                return 'Компания';

            }
        }

    }
</script>
<style scoped>


</style>


