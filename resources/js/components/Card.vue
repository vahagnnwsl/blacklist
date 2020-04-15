<template>
    <div class="col-md-3">
        <div class="card" >
            <img class="card-img-top" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{user.email}}</h5>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        mounted() {}
    }
</script>

<style scoped>

</style>
