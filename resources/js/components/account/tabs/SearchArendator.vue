<template>
    <div class="col-md-12">

        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row">
                <div class="input-group col-md-3">
                    <input type="text" class="form-control" placeholder="Все регионы" v-model="form.region">
                </div>
                <div class="input-group col-md-9">
                    <input type="text" class="form-control" placeholder="Recipient's username" v-model="form.key"
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
<!--        <div id="accordion">-->

<!--            <div class="card" v-for="(arendator,key) in arendators" @click="openCollapse(key)">-->
<!--                <div class="card-header">-->
<!--                    <a class="card-link" data-toggle="collapse" :href="'#collapse'+key">-->
<!--                        Collapsible Group Item #1-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div :id="'#collapse'+key" class="collapse " :class="collapse===key?'show':''" data-parent="#accordion">-->
<!--                    <div class="card-body">-->
<!--                        Lorem ipsum..-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->



<!--        </div>-->
        <div class="row mt-3 table-responsive">
            <div class="col-md-12">
                <div  class="row p-2 mb-2" v-for="(arendator,key) in arendators" style="border: 1px solid lightgray">

                    <div class="col-md-3">
                        <i class="fa fa-arrow-down"   @click="openCollapse(key)"></i>
                        <strong >{{arendator.full_name}}</strong>

                    </div>
                    <div class="col-md-6">
                        <p class="w-100" v-for="(item,key) in arendator.violations">
                             <span style="font-size: 0.8rem" class="w-50">{{item.full_name}}</span>
                             <span  style="font-size: 0.7rem" class="w-50 float-right">{{item.description.substring(1, 15)}}...</span>
                        </p>
                    </div>
                    <div class="col-md-3 text-right p-0" style="font-size: 0.8rem">
                        {{arendator.city}}  &nbsp {{arendator.date}}
                    </div>
                    <div class="col-md-12 " v-show="key===collapse" >
                        <h4>{{arendator.full_name}}</h4>
                        <div class="row" >
                            <div class="col-5">
                                 <p ><strong>Прописка:</strong><br>
                                     {{arendator.register}}
                                 </p>
                                <p><strong>Телефон:</strong><br>
                                    {{arendator.contact_phone}}
                                </p>
                                <p><strong>Дата рождения:</strong><br>
                                    {{arendator.birth_date}}
                                </p>
                            </div>
                            <div class="col-7 text-right">
                                <p v-for="(item,key) in arendator.violations">
                                    <strong>{{item.full_name}}:</strong> <span style="font-size: 0.7rem"> {{item.date}}</span><br>
                                    {{item.description}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

</template>

<script>
    import axios from "axios";

    export default {
        name: "SearchArendator",
        data() {
            return {
                form: {
                    region: '',
                    key: '',
                },
                collapse: 0,
                more20: false,
                noResult: false,
                arendators: {},
            }
        },

        methods: {
            openCollapse: function(key){
                this.collapse = key;
            },

            foolName: function (arendator) {
                return arendator.first_name + ' ' + arendator.last_name + ' ' + arendator.patronymic;
            },
            onSubmit: function () {
                this.more20 = false;
                this.noResult = false;
                axios.get('/account/arendators/search?region=' + this.form.region + '&key=' + this.form.key).then((resp) => {

                    this.arendators = resp.data.items;

                    if (resp.data.total > 20) {
                        this.more20 = true;
                    }

                    if (resp.data.total === 0){
                        this.noResult = true;
                    }
                })

            }
        }
    }
</script>

<style scoped>

</style>
