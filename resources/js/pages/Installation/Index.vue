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
                            <h5 class="text-black ps-5 m-0">Chiffre d'affaire</h5>
                        </div>
                        <div class="col-sm-5 text-black fw-bold text-end">
                            62 345€
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white ps-5 shadow-sm row py-3">
                        <div class="col-sm-7">
                            <h5 class="text-black m-0">Nombre de clients</h5>
                        </div>
                        <div class="col-sm-5 pe-5 text-black fw-bold text-end">
                            124
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-sm mt-3 px-2 py-2">
            <router-link to="/create" class="btn bg-green- text-white mb-3">Ajouter une installation</router-link>
            <table class="table table-responsive-md align-middle fs-6 table-bordered table-lg">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" class="" id=""></th>
                        <th>Date</th>
                        <th>Nom et Prénoms</th>
                        <th>Téléphone</th>
                        <th>Installateur</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="installation in installations" :key="installation.id">
                        <td><input type="checkbox" name="" id=""></td>
                        <td>{{ installation.created_at }}</td>
                        <td>{{ installation.client.lastname+" "+installation.client.firstname }}</td>
                        <td>{{ installation.client.phone }}</td>
                        <td>{{ installation.installator.lastname+" "+installation.installator.firstname }}</td>
                        <td>{{ installation.status }}</td>
                        <td class="hstack">
                            <i type="button" data-bs-toggle="modal" @click="show(installation)" data-bs-target="#showModal" class="uil uil-eye bg-success text-white text-white p-1 px-2 rounded"></i>
                            <router-link :to="{name: 'edit', params: {id: installation.id}}">
                                <i class="uil uil-edit-alt bg-warning text-white ms-2 p-1 px-2 rounded" type="button"></i>
                            </router-link>
                            <i class="uil uil-trash bg-danger text-white ms-2 p-1 px-2 rounded" @click="id = installation.id" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- DELETE -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment le supprimer ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" @click="deleteIt()" data-bs-dismiss="modal">Supprimer</button>
                </div>
                </div>
            </div>
        </div>

        <!-- SHOW -->
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Installation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" v-if="installation.client">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nom du client</td>
                                <td>{{ installation.client.lastname }}</td>
                            </tr>
                            <tr>
                                <td>Prénom du client</td>
                                <td>{{ installation.client.firstname }}</td>
                            </tr>
                            <tr>
                                <td>Téléphone du client</td>
                                <td>{{ installation.client.phone }}</td>
                            </tr>
                            <tr>
                                <td>Nom du l'installeur</td>
                                <td>{{ installation.installator.lastname }}</td>
                            </tr>
                            <tr>
                                <td>Prénom de l'installeur</td>
                                <td>{{ installation.installator.firstname }}</td>
                            </tr>
                            <tr>
                                <td>TTC</td>
                                <td>{{ installation.ttc }}€</td>
                            </tr>
                            <tr>
                                <td>Statut</td>
                                <td>{{ installation.status }}</td>
                            </tr>
                            <tr>
                                <td>Statut financement</td>
                                <td>{{ installation.financial_status }}</td>
                            </tr>
                            <tr>
                                <td>Statut CEE</td>
                                <td>{{ installation.cee_status }}</td>
                            </tr>
                            <tr>
                                <td>Statut MPR</td>
                                <td>{{ installation.mpr_status }}</td>
                            </tr>
                            <tr>
                                <td>Rapport Notes</td>
                                <td>{{ installation.note_report }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>

   </Template>
</template>

<script>
    import Template from '../../Components/Template.vue';
    import config from '../../Helpers/config';
    import swal from 'sweetalert';
    export default {
        name: "Installation",
        data() {
            return {
                installations: [],
                api: "",
                id: "",
                installation: {}
            }
        },
        components: {
            Template
        },
        methods: {
            current(id) {
                this.id = id
            },
            deleteIt() {
                this.axios.delete(this.api+this.id).then((response) => {
                    this.installations = this.installations.filter(i => i.id !== this.id)
                    swal("Suppression", "L'installation a été bien supprimé", "success");
                })
            },
            show(installation) {
                console.log(installation);
                this.installation = installation
            }
        },
        mounted() {
            this.api = config.API_URL+"installations/"
            this.axios.get(this.api).then((response) => {
                this.installations = response.data.data
            })
        }
    }
</script>
