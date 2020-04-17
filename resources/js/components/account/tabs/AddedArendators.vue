<template>
    <div class="col-md-12 mt-3">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-outline-secondary float-right"   data-toggle="modal" data-target="#myModal">
                    ДОБАВИТЬ
                </button>

                <NewArendator  @getResults="getResults" ></NewArendator>
            </div>
            <div class="col-md-12  table-responsive mt-4">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Тип арендатора:</th>
                        <th>ФИО</th>
                        <th>Адрес</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="arendator in laravelData.data" :key="arendator.id">
                        <td>{{type(arendator)}}</td>
                        <td>{{foolName(arendator)}}</td>
                        <td>{{address(arendator)}}</td>
                        <th>
                            <button class="btn btn-outline-secondary float-right" data-toggle="modal" data-target="#myModal1"
                                    @click="getViolations(arendator.id)"><i class="fa fa-edit"></i>
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
            <Violations  :violations="violations" :user_id="user_id"></Violations>
        </div>
    </div>

</template>

<script>


    import axios from "axios";
    import NewArendator from "../modals/NewArendator";
    import Violations from "../modals/Violations";
    import Pagination from "laravel-vue-pagination";


    export default {
        name: "AddArendator",
        components: {NewArendator, Pagination, Violations},
        props:['user_id'],
        data() {
            return {
                showModal:false,
                laravelData: {},
                violations: {}
            }
        },
        mounted() {
            this.getResults();
        },
        computed: {},
        methods: {

            getResults: function (page = 1) {
                axios.get('/account/arendators/?page=' + page).then((resp) => {

                    this.laravelData = resp.data

                })
            },
            foolName: function (arendator) {
                return arendator.first_name + ' ' + arendator.last_name + ' ' + arendator.patronymic;
            },
            getViolations: function (id) {
                axios.get('/account/arendators/' + id +'/violations').then((resp) => {
                    this.violations = resp.data
                })
            },
            address: function (arendator) {
                return arendator.region + ' ' + arendator.city;
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


