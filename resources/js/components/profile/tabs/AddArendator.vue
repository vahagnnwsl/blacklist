<template>
    <div class="col-md-12 mt-3">
        <div class="row">
            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active"  data-toggle="tab"href="#" @click="showTab('Individual')">ФИЗИЧЕСКОЕ ЛИЦО</a></li>
                <li class="nav-item"><a class="nav-link" href="#"  data-toggle="tab" @click="showTab('Juridical')">ЮРИДИЧЕСКОЕ ЛИЦО</a></li>
                <li class="nav-item"><a class="nav-link" href="#"  data-toggle="tab" @click="showTab('IndividualEntrepreneur')">ИП</a></li>
            </ul>
            <div class="col-md-12">
                <Individual v-if="showComponent==='Individual'"></Individual>
                <IndividualEntrepreneur v-if="showComponent==='IndividualEntrepreneur'"></IndividualEntrepreneur>
                <Juridical v-if="showComponent==='Juridical'"></Juridical>
            </div>
        </div>
    </div>

</template>

<script>
    import Individual from "./subTabs/Individual";
    import IndividualEntrepreneur from "./subTabs/IndividualEntrepreneur";
    import Juridical from "./subTabs/Juridical";

    export default {
        name: "AddArendator",
        components: {
            Individual,
            IndividualEntrepreneur,
            Juridical,
        },
        data() {
            return {
                showComponent: 'Individual',
            }
        },
        methods: {
            showTab: function (tab) {
                this.showComponent = tab;
            }
        }
    }
</script>

<style scoped>

    #myTab a {
        color: #6C757D !important;
    }

    #myTab .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #6C757D;

        font-weight: bold;
    }


</style>
