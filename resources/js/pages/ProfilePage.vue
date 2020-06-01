<template>
    <div class="col-md-8">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav_tab" role="tablist">

                <a class="nav-item nav-link active" data-toggle="tab" role="tab" @click="showTab(1)"
                   aria-controls="nav-one" aria-selected="true"> ОСНОВНЫЕ ДАННЫЕ</a>

                <a class="nav-item nav-link " data-toggle="tab" role="tab"
                   @click="showTab(2)"
                   aria-controls="nav-three" aria-selected="true"> КОНТАКТНЫЕ ДАННЫЕ</a>

                <a class="nav-item nav-link" data-toggle="tab" role="tab"  @click="showTab(3)"
                   aria-controls="nav-two" aria-selected="false"> БЕЗОПАСНОСТЬ</a>

            </div>
        </nav>
        <div class="row">
            <BasicComponent v-if="showComponent===1" :basic_data="user.basic" :auth_type='auth_type'></BasicComponent>
            <ContactComponent v-if="showComponent===2" :contact_data="user.contact"  :auth_type='auth_type'></ContactComponent>
            <SecurityComponent v-if="showComponent===3"></SecurityComponent>
        </div>
    </div>
</template>

<script>
    import BasicComponent from "../components/BasicComponent";
    import ContactComponent from "../components/ContactComponent";
    import SecurityComponent from "../components/SecurityComponent";

    export default {
        name: "ProfilePage",
        props: ['user', 'auth_type'],
        components: {BasicComponent, ContactComponent, SecurityComponent},
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
    .invalid-feedback {
        display: block !important;
    }
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
