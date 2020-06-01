<template>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true" ref="modal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center"><strong>Нарушение арендатора </strong></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row  justify-content-center">
                        <div class="col-10">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Нарушение</th>
                                    <th>Статус</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(violation,key) in violations" :key="key">
                                    <td>{{key+1}}</td>
                                    <td>{{violation.description}} {{violation.status}}</td>
                                    <td v-if="violation.user_id===user_id">
                                        <select class="form-control form-control-sm" @change="updateStatus($event,violation.id)" v-model="violation.status">
                                            <option value="0">Не погашено</option>
                                            <option value="1">Погашено</option>
                                        </select>
                                    </td>
                                    <td v-else>
                                        {{status(violation.status)}}
                                    </td>
                                    <td>{{violation.date}}</td>
                                </tr>

                                </tbody>
                            </table>
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
        name: "Violations",
        props: ['violations','user_id'],

        methods: {
            status: function (status) {
                if (Number(status) === 1) {
                    return 'Погашено';
                }
                return 'Не погашено';
            },
            updateStatus: function(event,violationId){

                axios.post('/account/violations/'+violationId, {status:event.target.value}).then(() => {
                    $.toaster({message: 'Успешно обновлено', title: 'Успешно!', priority: 'success'});
                })
            }
        }
    }
</script>

<style scoped>

</style>
