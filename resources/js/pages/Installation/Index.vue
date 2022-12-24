<template>
    <Template>
        <div class="bg-white shadow-sm px-5 py-2 hstack">
            <i class="uil uil-folder fs-5 text-white bg-danger rounded p-1 px-2"></i>
            <h4 class="text-black fs-5 ms-4 mt-2">Dossiers clients après installation</h4>
            <span class="ms-auto text-black fs-4 fw-bold">16</span>
        </div>

        <div class="bg-white shadow-sm px-5 py-2 hstack mt-3">
            <span class="text-black">Période sélectionné</span>
            <form action="" class="ms-3 hstack">
                <input type="date" class="form-control ms-auto">
                <span class="mx-4">au</span>
                <input type="date" class="form-control">
                <input type="button" value="Voir" class="btn btn-danger ms-4 px-5">
            </form>
        </div>

        <div class="py-2 mt-2 px-2">
            <div class="row  gx-5">
                <div class="col-lg-6">
                    <div class="bg-white shadow-sm row py-3">
                        <div class="col-sm-7">
                            <h4 class="text-black ps-5 m-0">Chiffre d'affaire</h4>
                        </div>
                        <div class="col-sm-5 text-black fw-bold text-end">
                            62 345€
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white ps-5 shadow-sm row py-3">
                        <div class="col-sm-7">
                            <h4 class="text-black m-0">Nombre de clients</h4>
                        </div>
                        <div class="col-sm-5 pe-5 text-black fw-bold text-end">
                            124
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-sm mt-3 px-5 py-2">
            <h4 class="text-black fs-6">Nom du client</h4>
            <div class="row">

            </div>
        </div>


        <div class="bg-white shadow-sm mt-3 px-5 py-2">
            <table>
                <thead>
                    <tr>
                        <table><input type="checkbox" name="" id=""></table>
                        <th>Date</th>
                    </tr>
                </thead>
            </table>
            <div v-for="installation in installations" :key="installation.id">
                {{ installation }}
            </div>
        </div>




   </Template>
</template>

<script>
    import Template from '../../Components/Template.vue';
    import config from '../../Helpers/config';
    export default {
        name: "Installation",
        data() {
            return {
                installations: [],
                api: ""
            }
        },
        components: {
            Template
        },
        mounted() {
            this.api = config.API_URL+"installations"
            this.axios.get(this.api).then((response) => {
                console.log('====================================');
                console.log(response.data);
                console.log('====================================');
                this.installations = response.data
            })
        }
    }
</script>
