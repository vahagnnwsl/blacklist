<template>
    <div class="col-md-12">

        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row ">
                <div class="input-group col-md-3 pl-0">
                    <input type="text" class="form-control" placeholder="Все регионы" v-model="form.region">
                </div>
                <div class="input-group col-md-9 pr-0">
                    <input type="text" class="form-control" placeholder="ФИО, телефон, паспорт, регион, город, прописка" v-model="form.key"
                           aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" style="border:1px solid #D8DDE3">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </form>

        <div class="row mt-3" v-if="noResult">
            <div class="col-md-12">
                <h5 class="w-100 text-center text-secondary">
                    Ничего не найдено
                </h5>
            </div>
        </div>
        <div class="row mt-3" v-if="more20">
            <div class="col-md-12">
                <h6 class="w-100 text-right text-secondary">Найдено <span class="badge badge-secondary">+20</span></h6>
                <h5 class="w-100 text-right text-secondary">
                    Уточните критерии запроса для уменьшения количества результатов
                </h5>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row p-2 mb-2" style="border: 1px solid lightgray" v-for="(arendator,key) in arendators">
                    <div class="col-md-3 col-sm-12 text-center" style="vertical-align: middle">
                        <strong>{{arendator.full_name}}</strong>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <h6 v-for="(item,key) in arendator.violations">{{item.full_name}} <small><i>{{item.description.substring(1,
                            25)}}...</i></small></h6>
                    </div>
                    <div class="col-md-3 col-sm-12 text-right" style="position: relative" ref="aa">
                        <h6 class="dateCity">{{arendator.city}} <small><i>{{arendator.date}}</i></small></h6>

                        <button class="btn btn-outline-secondary btn-sm  eyeBtn" @click="openModal(arendator.id)">
                            <i class="fa fa-eye"></i>
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="arendatorModal" tabindex="-1" role="dialog" aria-hidden="true" ref="arendatorModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100 text-left"><strong>{{arendator.full_name}}</strong></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5 col-sm-12">

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
                            <div class="col-lg-7 col-sm-12">
                                <div class="row" v-for="violation in arendator.violations" style="border-bottom: 1px solid lightgray">
                                    <h5 class="mt-3 p-1" >
                                        <i>{{violation.full_name}}</i> <small><i>{{violation.date}}</i></small><br>
                                        <small >
                                            {{violation.description}}
                                        </small><br>
                                        <a v-if="violation.document" :href="'/storage'+violation.document" target="_blank"
                                           class="float-right text-secondary"><small><strong><i>Документ</i></strong></small></a>

                                    </h5>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ArendatorModal from "../modals/Arendator";

    export default {
        name: "SearchArendator",
        components: {ArendatorModal},
        data() {
            return {
                form: {
                    region: '',
                    key: '',
                },
                more20: false,
                noResult: false,
                arendators: {},
                arendator: {},
            }
        },


        methods: {
            openModal: function (id) {
                axios.get('/account/arendators/' + id).then((resp) => {
                    this.arendator = resp.data;
                    $(this.$refs.arendatorModal).modal('show');
                })


            },
            onSubmit: function () {
                if (this.form.region === '' && this.form.key === '') {
                    return;
                }
                this.more20 = false;
                this.noResult = false;
                axios.get('/account/arendators/search?region=' + this.form.region + '&key=' + this.form.key).then((resp) => {

                    this.arendators = resp.data.items;

                    if (resp.data.total > 20) {
                        this.more20 = true;
                    }

                    if (resp.data.total === 0) {
                        this.noResult = true;
                    }
                })

            }
        }
    }
</script>

<style scoped>

</style>
