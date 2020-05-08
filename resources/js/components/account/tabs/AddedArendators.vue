<template>
    <div class="col-12 mt-3">
        <div class="row">
            <div class="col-md-12 mt-4" v-if="arendators">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>АРЕНДАТОР</th>
                        <th>АДРЕС</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="arendator in arendators" :key="arendator.id"  @click="openModal(arendator.id)" style="cursor: pointer">
                        <td>
                            <span v-if="arendator.type===1">
                                    <strong>{{arendator.full_name}}</strong>
                                 </span>
                            <span v-else>
                                   <small style="font-size: 0.7rem"><i>ИП/ООО</i></small>    <strong>{{arendator.company_name}}</strong>
                                 </span>
                        </td>
                        <td>
                            {{address(arendator)}}

                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <template>
                <div class="modal fade" id="arendatorModal" tabindex="-1" role="dialog" aria-hidden="true"
                     ref="arendatorModal">
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
                                <Arendator :arendator="arendator" :user_id="user_id"></Arendator>
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
    import Pagination from "laravel-vue-pagination";
    import Arendator from '../includes/Arendator';


    export default {
        name: "AddArendator",
        components: {Arendator},
        props: ['user_id'],
        data() {
            return {
                showModal: false,
                arendators: {},
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
            collapse: function (ref) {

                if(this.$refs[ref][0].classList.contains("pCollapse")){
                    this.$refs[ref][0].classList.remove("pCollapse");
                }else {
                    this.$refs[ref][0].classList.add("pCollapse");
                }
            },
            openModal: function (id) {
                axios.get('/account/arendators/' + id).then((resp) => {
                    this.arendator = resp.data;
                    $(this.$refs.arendatorModal).modal('show');
                })
            },

            getResults: function () {
                axios.get('/account/arendators').then((resp) => {

                    this.arendators = resp.data.data

                })
            },
            address: function (arendator) {
                var address = arendator.region + ' ' + arendator.city;
                if (arendator.address) {
                    address += ' ' + arendator.address
                }

                return address;
            }
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

