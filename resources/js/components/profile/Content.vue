<template>
    <div class="col-md-8">
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav_tab" role="tablist">
                <a class="nav-item nav-link active" data-toggle="tab" role="tab" @click="showTab('Basic')"
                   id="nav-one-tab" href="#"
                   aria-controls="nav-one" aria-selected="true"> ОСНОВНЫЕ ДАННЫЕ</a>
                <a class="nav-item nav-link " data-toggle="tab" role="tab" id="nav-three-tab"
                   @click="showTab('Contact')" href="#t"
                   aria-controls="nav-three" aria-selected="true"> КОНТАКТНОЕ ДАННЫЕ</a>
                <a class="nav-item nav-link" data-toggle="tab" role="tab" id="nav-two-tab" @click="showTab('Security')"
                   href="#"
                   aria-controls="nav-two" aria-selected="false"> БЕЗОПАСНОСТЬ</a>
            </div>
        </nav>
        <div class="row">
            <Basic v-if="showComponent==='Basic'" :basic_data="user.basic" :auth_type='auth_type'></Basic>
            <Contact v-if="showComponent==='Contact'" :contact_data="user.contact"  :auth_type='auth_type'></Contact>
            <Security v-if="showComponent==='Security'"></Security>
        </div>
    </div>
</template>

<script>
    import Basic from "./tabs/Basic";
    import Contact from "./tabs/Contact";
    import Security from "./tabs/Security";

    export default {
        name: "Content",
        props: ['user', 'auth_type'],
        components: {Basic, Contact, Security},
        data() {
            return {
                showComponent: 'Basic',
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
