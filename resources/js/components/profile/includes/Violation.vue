<template>
    <div class="form-group col-md-12 ">
       <div class="row">
           <div class="form-group col-md-5">
               <label :for='"violation"+id' >Нарушение: <span class="text-danger">*</span></label>
               <input type="text" class="form-control" :name="'violations['+id+'][violation]'" :id='"violation"+id'
                      data-vv-as="Нарушение" v-validate="'required'" v-model="model.violation" >
               <small class="text-danger  float-right"
                      v-if="errors.has('violation')">{{errors.first('violation')}}</small>
           </div>
           <div class="form-group col-md-3">
               <label :for='"violation-status"+id'>Статус нарушения: <span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="status" :id='"violation-status"+id'
                      data-vv-as="Статус нарушения" v-validate="'required'"  v-model="model.status">
               <small class="text-danger  float-right"
                      v-if="errors.has('status')">{{errors.first('status')}}</small>
           </div>
           <div class="form-group col-md-3">
               <label :for='"violation-date"+id'>Дата : <span class="text-danger">*</span></label>
               <input type="date" class="form-control" name="date" :id='"violation-date"+id'
                      data-vv-as="Дата нарушения" v-validate="'required'"   v-model="model.date">
               <small class="text-danger  float-right"
                      v-if="errors.has('date')">{{errors.first('date')}}</small>
           </div>

           <div class="form-group col-md-1" v-if="">
               <button type="button" class="btn btn-outline-danger btn-block" style="margin-top: 30px" @click="remove(model)"><i class="fa fa-minus"></i></button>
           </div>
       </div>
    </div>
</template>

<script>
    export default {
        props: ['id','model'],
        name: "Violation",
        methods: {
            remove :function (model) {
                this.$emit('remove',model)
            }
        }
    }
</script>

<style scoped>

</style>
