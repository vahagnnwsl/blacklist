<template>
    <div class="col-md-12 ">
        <h5 class="text-center w-100">Добавить нарушение</h5>

        <div style="border: 1px solid lightgray" class="form-group col-md-12  mt-2">
            <div class="row">
                <div class="col-sm-12 col-md-4 form-group ">
                    <label>Дата<span class="text-danger">*</span></label>
                    <input type="date" class="form-control  form-control-sm"
                           name="date"
                           data-vv-as="Дата нарушения" v-validate="'required'"
                           v-model="violation.date">
                    <small class="text-danger  float-right"
                           v-if="errors.has('date')">{{errors.first('date')}}</small>
                </div>
                <div class="col-sm-12 col-md-4 form-group">
                    <label>Статус <span class="text-danger">*</span></label>
                    <select class="form-control form-control-sm" v-model="violation.status"
                            name="status"
                            data-vv-as="Статус нарушения"
                            v-validate="'required'">
                        <option value="0">Не погашено</option>
                        <option value="1">Погашено</option>
                    </select>

                    <small class="text-danger  float-right"
                           v-if="errors.has('status')">{{errors.first('status')}}</small>
                </div>
                <div class="col-sm-12 col-md-4 form-group">
                    <label>Документ </label>
                    <input type="file"
                           id="document"
                           ref="document"
                           class="form-control form-control-sm"
                           name="document"
                           data-vv-as="Документ" v-on:change="handleFileUpload"
                           v-validate="'ext:jpg,pdf,jpeg,gif,tiff'">

                    <small class="text-danger  float-right" v-if="errors.has('document')">
                        {{
                        'Тип загруженного файла не поддерживается. Загрузите, пожалуйста, jpg, gif, tiff или pdf файл.Размер файла должен состовлять не более 7мб'}}
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 form-group">
                    <label>Нарушение </label>
                    <textarea class="form-control  form-control-sm"
                              name="description"

                              data-vv-as="Нарушение" v-validate="'required'"
                              v-model="violation.description">
                                    >
                                    </textarea>

                    <small class="text-danger  float-right"
                           v-if="errors.has('description')">{{errors.first('description')}}</small>
                </div>
            </div>

            <small class="text-danger  float-right w-100 text-right"
                   v-if="violationsCountError">{{violationsCountError}}</small>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ViolationFormComponent",
        props: ['violation'],
        inject: ['$validator'],
        data() {
            return {
                violationsCountError: '',

            }
        },
        methods: {
            handleFileUpload: function () {

                if (!this.errors.has('document')) {
                    var self = this;

                    var   file = this.$refs['document'].files[0];
                    var   reader = new FileReader();


                    if (typeof file !== 'object') {
                        self.violation.document = '';
                        return;
                    }

                    reader.onloadend = function () {
                        self.violation.document = reader.result;
                    };

                    reader.readAsDataURL(file);
                }

            },
        }
    }
</script>

<style scoped>

</style>
