<template>
    <div class="col-md-12">

        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row ">
                <div class="input-group col-md-3 pl-0">
                    <input type="text" class="form-control" placeholder="Все регионы" v-model="form.region">
                </div>
                <div class="input-group col-md-9 pr-0">
                    <input type="text" class="form-control" placeholder="ФИО, телефон, паспорт, регион, город, прописка"
                           v-model="form.key"
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
        <div class="row mt-3" v-if="less20">
            <div class="col-md-12">
                <h6 class="w-100 text-right text-secondary">Найдено <span
                    class="badge badge-secondary">{{less20}}</span></h6>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row p-2 mb-2" style="border: 1px solid lightgray" v-for="(arendator,key) in arendators">
                    <div class="col-md-3 col-sm-12 text-center" style="vertical-align: middle">
                        <span v-if="arendator.type===1">
                            <strong>{{arendator.full_name}}</strong>
                        </span>
                        <span v-else>
                            <small
                                style="font-size: 0.7rem"><i>ИП/ООО</i></small>    <strong>{{arendator.company_name}}</strong>
                        </span>

                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <h6 v-for="(item,key) in arendator.violations">
                            <span v-if="item.user.full_name">
                                {{item.user.full_name}}
                            </span>
                            <span v-else> <small style="font-size: 0.6rem"><i>ИП/ООО</i> </small> {{item.user.company_name}}</span>
                            <small>
                                <i>{{item.description.substring(1,
                                    25)}}...
                                </i>
                            </small>
                        </h6>
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

                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <Arendator :arendator="arendator" :user_id="0"></Arendator>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ArendatorModal from "../modals/Arendator";
    import Arendator from '../includes/Arendator';

    export default {
        name: "SearchArendator",
        components: {ArendatorModal,Arendator},
        data() {
            return {
                form: {
                    region: '',
                    key: '',
                },
                more20: false,
                less20: false,
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
                this.less20 = false;
                this.noResult = false;
                axios.get('/account/arendators/search?region=' + this.form.region + '&key=' + this.form.key).then((resp) => {

                    this.arendators = resp.data.items;

                    if (resp.data.total > 20) {
                        this.more20 = true;
                    } else {
                        this.less20 = resp.data.total;
                    }

                    if (resp.data.total === 0) {
                        this.noResult = true;
                    }
                })

            }
        }
    }
</script>


