<template>
     <div >
          <div class="row">
              <div class="col-12">
                  <div class="btn-group btn-group-md mt-2 float-right">
                      <button type="button"   :class="btnClassOne" @click="showTab('individual')">ФИЗ. ЛИЦО</button>
                      <button type="button"  :class="btnClassTwo" @click="showTab('IndividualEntrepreneur')" >ИП/ООО</button>
                  </div>
              </div>
          </div>

         <individual v-if="showComponent==='individual'" @childEvent=""></individual>
         <IndividualEntrepreneur v-if="showComponent==='IndividualEntrepreneur'"></IndividualEntrepreneur>
     </div>
</template>

<script>
    import Individual from '../tabs/Individual';
    import IndividualEntrepreneur from '../tabs/IndividualEntrepreneur';
    export default {
        name: "NewArendator",
        components: {Individual,IndividualEntrepreneur},
        data() {
            return {
                showComponent: 'individual',
                btnClassOne : 'btn btn-secondary',
                btnClassTwo : 'btn btn-light'
            }
        },
        methods: {

            showTab: function (tab) {
                if(tab === 'individual'){
                    this.btnClassOne = 'btn btn-secondary';
                    this.btnClassTwo = 'btn btn-light';
                }else {
                    this.btnClassOne = 'btn btn-light';
                    this.btnClassTwo = 'btn btn-secondary';
                }

                this.showComponent = tab;
            }
        }
    }
</script>

<style scoped>



    .invalid-feedback {
        display: block !important;
    }

    .type-tab {
        border: 1px solid grey;
        border-radius: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 10px;
        padding-right: 10px;
    }
    #nav_tab a {
        color: #6C757D !important;

    }

    #nav_tab .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: #6C757D;
        background-color: transparent;
        border-color: transparent transparent #f3f3f3;
        font-weight: bold;
    }
</style>
