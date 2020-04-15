<template>
    <div class="col-md-9">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav_tab" role="tablist">
                <a class="nav-item nav-link active" data-toggle="tab" role="tab" @click="showTab('SearchArendator')"
                   id="nav-one-tab" href="#"
                   aria-controls="nav-one" aria-selected="true"> ПОИСК АРЕНДАТОРОВ В СЕРВИСЕ</a>
                <a class="nav-item nav-link " data-toggle="tab" role="tab" id="nav-three-tab"
                   @click="showTab('AddArendator')" href="#"
                   aria-controls="nav-three" aria-selected="true"> ДОБАВИТЬ АРЕНДАТОРА</a>
            </div>
        </nav>
        <div class="row">
            <SearchArendator v-if="showComponent==='SearchArendator'" ></SearchArendator>
            <AddArendator v-if="showComponent==='AddArendator'"></AddArendator>
        </div>
    </div>
</template>

<script>
    import AddArendator from "./tabs/AddArendator";
    import SearchArendator from "./tabs/SearchArendator";

    export default {
        name: "Content",
        components: {AddArendator, SearchArendator},
        data() {
            return {
                showComponent: 'SearchArendator',
            }
        },
        mounted() {

        },
        methods: {
            showTab: function (tab) {
                this.showComponent = tab;
            }
        }
    }
</script>

<style scoped>

    .invalid-feedback {
        display: block !important;
    }

    #nav_tab a {
        color: #6C757D !important;
    }

    #nav_tab .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #6C757D;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        border-bottom: 4px solid !important;

        font-weight: bold;
    }
</style>

