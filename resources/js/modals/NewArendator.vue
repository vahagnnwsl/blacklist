<template>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" ref="modal">
        <div class="modal-dialog modal-xl ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center"><strong>Добавить новое арендатор</strong></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav_tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" role="tab"
                               @click="showTab('individual')"
                               id="nav-one-tab" href="#"
                               aria-controls="nav-one" aria-selected="true"> ФИЗ. ЛИЦО</a>
                            <a class="nav-item nav-link " data-toggle="tab" role="tab" id="nav-three-tab"
                               @click="showTab('IndividualEntrepreneur')" href="#"
                               aria-controls="nav-three" aria-selected="true"> ИП/ООО</a>
                        </div>
                    </nav>
                    <individual v-if="showComponent==='individual'" @childEvent=""></individual>
                    <IndividualEntrepreneur v-if="showComponent==='IndividualEntrepreneur'"></IndividualEntrepreneur>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Individual from '../components/account/tabs/Individual';
    import IndividualEntrepreneur from '../components/account/tabs/IndividualEntrepreneur';

    export default {
        name: "NewArendator",
        components: {Individual,IndividualEntrepreneur},
        data() {
            return {
                showComponent: 'individual',
            }
        },
        methods: {
            getResult: function(arg){
              console.log(arg)
            },
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
