<template>
    <div>
        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" data-focus-on="input:first"
             aria-hidden="true"
             ref="modal" data-width="760">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100 text-left">
                                 <span v-if="arendator.type===1">
                                    <strong>{{arendator.full_name}}</strong>
                                 </span>
                            <span v-else>
                                   <small style="font-size: 0.7rem"><i>ИП/ООО</i></small>    <strong>{{arendator.company_name}}</strong>
                                 </span>

                            <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal"
                                    href="#stack2">Добавить отзыв
                            </button>


                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12">

                                <h5 v-if="arendator.register">
                                    <strong>Прописка</strong><br>
                                    <small>
                                        {{arendator.register}}
                                    </small>
                                </h5>

                                <h5 class="mt-3" v-if="arendator.company_name">
                                    <strong>Наименование организации</strong><br>
                                    <small>
                                        {{arendator.company_name}}
                                    </small>
                                </h5>

                                <h5 class="mt-3" v-if="arendator.inn">
                                    <strong>ИНН</strong><br>
                                    <small>
                                        {{arendator.inn}}
                                    </small>
                                </h5>
                                <h5 class="mt-3" v-if="arendator.region">
                                    <strong>Регион </strong><br>
                                    <small>
                                        {{arendator.region}}
                                    </small>
                                </h5>
                                <h5 class="mt-3" v-if="arendator.city">
                                    <strong>Город </strong><br>
                                    <small>
                                        {{arendator.city}}
                                    </small>
                                </h5>
                                <h5 class="mt-3" v-if="arendator.address">
                                    <strong>Адрес </strong><br>
                                    <small>
                                        {{arendator.address}}
                                    </small>
                                </h5>

                                <h5 v-if="arendator.type===2">
                                    <hr>
                                    Контактное данные
                                </h5>

                                <h5 class="mt-3">
                                    <strong>ФИО </strong><br>
                                    <small>
                                        {{arendator.full_name}}
                                    </small>
                                </h5>

                                <h5 class="mt-3">
                                    <strong>Паспорт </strong><br>
                                    <small>
                                        {{arendator.passport_serial}} {{arendator.passport_number}}
                                    </small>
                                </h5>

                                <h5 class="mt-3">
                                    <strong>Телефон</strong><br>
                                    <small>
                                        {{arendator.phone}}
                                    </small>
                                </h5>

                                <h5 class="mt-3" v-if="arendator.birth_date">
                                    <strong>Дата рождения</strong><br>
                                    <small>
                                        {{arendator.birth_date}}
                                    </small>
                                </h5>

                            </div>
                            <div class="col-lg-8 col-sm-12">
                                <div class="row" v-for="(violation,key) in arendator.violations"
                                     style="border-bottom: 1px solid lightgray">
                                    <h5 class="mt-3 p-2 w-100">
                                        <i style="cursor: pointer" data-toggle="collapse"
                                           :data-target="'#demo'+violation.id">
                                                  <span v-if="violation.user.company_name">
                                                     <small style="font-size: 0.5rem">ИП/ООО</small>   {{violation.user.company_name}}
                                                  </span>
                                            <span v-else>
                                                       {{violation.user.full_name}}
                                                  </span>
                                        </i>
                                        <small class="float-right">
                                            <i>
                                                {{violation.date}}
                                            </i>
                                        </small>
                                        <br>
                                    </h5>
                                    <div :id="'demo'+violation.id"
                                         class="collapse row form-group  w-100  pr-2 pl-2 ml-2">
                                        <div class="row w-100   pr-4 pl-2">
                                            <div class="col-sm-12 col-md-4 ">
                                                <h6>
                                                    ФИО <br>
                                                    <small>
                                                        <i>{{violation.user.full_name}}</i>
                                                    </small>
                                                </h6>
                                                <h6>
                                                    Е-мейл<br>
                                                    <small>
                                                        <i>{{violation.user.email}}</i>
                                                    </small>
                                                </h6>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <h6>
                                                    Телефон<br>
                                                    <small>
                                                        <i> {{violation.user.phone}}</i>
                                                    </small>
                                                </h6>
                                                <h6>
                                                    Город <br>
                                                    <small>
                                                        <i> {{violation.user.city}}</i>
                                                    </small>
                                                </h6>

                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <h6>
                                                    Адрес <br>
                                                    <small>
                                                        <i> {{violation.user.address}}</i>
                                                    </small>
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group w-100  p-2 module">
                                        <p class="w-100 pCollapse" :ref="'collapse'+violation.id">
                                            <small :id="'collapse'+violation.id">
                                                {{violation.description}}
                                            </small>
                                        </p>


                                        <p class="w-100 mt-2 text-right">
                                            <a v-if="violation.description.length > 278" role="button"
                                               class="mt-2 text-secondary font-weight-bold" style="cursor: pointer"
                                               @click="collapse('collapse'+violation.id,$event)">
                                                Читать дальше
                                            </a><br>
                                            <a v-if="violation.document" :href="violation.document"
                                               target="_blank" class="mt-2 text-secondary">
                                                <strong>Документ</strong>
                                            </a>
                                        </p>
                                        <br>
                                    </div>
                                    <div class="form-group  w-100  pt-0" v-if="violation.user.id === user_id">

                                        <div class="custom-control custom-switch w-100">
                                            <input type="checkbox" class="custom-control-input" :id="'switch'+key"
                                                   :checked="Number(violation.status)===1"
                                                   @change="updateStatus(violation.id,'switch'+key+violation.id)">
                                            <label class="custom-control-label" :for="'switch'+key"
                                                   :ref="'switch'+key+violation.id">
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

        <div id="stack2" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title"><strong>Добавить </strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="onSubmit" class="w-100" ref="form">
                            <ViolationFormComponent :violation="violation"></ViolationFormComponent>
                            <div class="form-group col-md-12">
                                <div class="btn-group float-right" role="group" aria-label="Basic example">
                                    <button type="button" ref="closeModal" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Отменить
                                    </button>
                                    <button class="btn btn-dark btn-block ml-2">Сохранить</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


</template>

<script>
    import ViolationFormComponent from '../components/ViolationFormComponent'
    import axios from "axios";

    export default {
        name: "ArendatorModal",
        props: ['arendator', 'user_id'],
        components: {ViolationFormComponent},
        data() {
            return {
                violation: {
                    description: '',
                    document: '',
                    date: '',
                    status: 0
                }
            }
        },
        methods: {
            collapse: function (ref, event) {

                if (this.$refs[ref][0].classList.contains("pCollapse")) {
                    this.$refs[ref][0].classList.remove("pCollapse");
                    event.target.innerText = 'Cвернуть'
                } else {
                    this.$refs[ref][0].classList.add("pCollapse");
                    event.target.innerText = 'Читать дальше'

                }
            },

            sortArray: function (array) {
                return array;
            },

            arrayMove: function (a, b) {
                return (b.user_id === this.user_id) - (a.user_id === this.user_id);
            },

            onSubmit: function () {
                this.$validator.validate().then(valid => {

                    if (valid) {
                        axios.post(`/account/violations/${this.arendator.id}/store`, this.violation).then((resp) => {

                            $.toaster({message: ' добавлено', title: 'Успешно ', priority: 'success'});
                            const violation = resp.data.violation;
                            console.log( this.$parent.arendator)

                            this.$parent.arendator.violations.push(violation);

                            this.violation = {
                                description: '',
                                document: '',
                                date: '',
                                status: 0
                            };

                            this.$validator.reset();

                        }).catch((error) => {
                           console.log(error)
                        })
                    }
                })
            },
            updateStatus: function (violationId, ref) {

                axios.post('/account/violations/' + violationId).then((resp) => {
                    $(this.$refs[ref]).text(resp.data.text);

                    $.toaster({message: 'Успешно обновлено', title: 'Успешно!', priority: 'success'});
                })
            },
        }
    }
</script>

<style scoped>
    .pCollapse {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

</style>
