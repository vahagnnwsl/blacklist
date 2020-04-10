<template>
    <div class="col-md-12">
        <form class="mt-3" @submit.prevent="onSubmit">
            <div class="row">
                <div class="input-group col-md-3">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option disabled selected>Все регионы</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="input-group col-md-9">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" style="border:1px solid #D8DDE3">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "SearchArendator",
        data(){
            return {
                key: ''
            }
        },
        methods: {
            onSubmit:function () {

            }
        }
    }
</script>

<style scoped>

</style>
