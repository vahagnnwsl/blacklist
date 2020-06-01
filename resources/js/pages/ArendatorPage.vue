<template>
    <div class="col-md-9">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav_tab" role="tablist">

                <a class="nav-item nav-link active" data-toggle="tab" role="tab" @click="showTab(1)"
                   aria-controls="nav-one" aria-selected="true"> ПОИСК АРЕНДАТОРОВ В СЕРВИСЕ</a>

                <a class="nav-item nav-link " data-toggle="tab" role="tab"
                   @click="showTab(2)"
                   aria-controls="nav-three" aria-selected="true"> МОИ АРЕНДАТОРЫ</a>

                <a class="nav-item nav-link " data-toggle="tab" role="tab"
                   @click="showTab(3)"
                   aria-controls="nav-three" aria-selected="true"> ДОБАВИТЬ НОВОГО АРЕНДАТОРА</a>

            </div>
        </nav>

        <SearchComponent v-if="showComponent === 1"></SearchComponent>
        <ArendatorsComponent v-if="showComponent === 2" :user_id="user_id"></ArendatorsComponent>
        <ArendatorFormComponent v-if="showComponent === 3" :user_id="user_id"></ArendatorFormComponent>
    </div>
</template>

<script>
    import ArendatorsComponent from "../components/ArendatorsComponent";
    import SearchComponent from "../components/SearchComponent";
    import ArendatorFormComponent from "../components/ArendatorFormComponent";

    export default {
        name: "Content",
        components: {ArendatorsComponent, SearchComponent, ArendatorFormComponent},
        props: ["user_id"],
        data() {
            return {
                showComponent: 1,
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

    .nav-item {
        cursor: pointer;
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

