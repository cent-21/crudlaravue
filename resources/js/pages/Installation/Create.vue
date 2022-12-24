<template>
    <Template>
        <div class="bg-white shadow-sm px-5 py-2 hstack">
            <i class="uil uil-plus-circle fs-5 text-white bg-danger rounded p-1 px-2"></i>
            <h4 class="text-black fs-5 ms-4 mt-2">Ajouter une installation</h4>
        </div>

        <div class="bg-white shadow-sm px-5 py-4 mt-3">
            <form @submit="createInstallation()" class="row g-4">
                <div class="col-lg-6">
                    <label class="text-black mb-2">Client</label>
                    <select v-model="client_id" class="form-control-">
                        <option v-for="client in clients" :key="client.id" :value="client.id">{{ client.lastname+" "+client.firstname }}</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Installateur</label>
                    <select v-model="installator_id" class="form-control-">
                        <option v-for="installator in installators" :key="installator.id" :value="installator.id">{{ installator.lastname+" "+installator.firstname }}</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Code Postal</label>
                    <input type="number" v-model="postal_code" class="form-control-">
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Ville</label>
                    <input type="text" v-model="city" class="form-control-">
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">TTC</label>
                    <input type="number" step="0.1" v-model="ttc" class="form-control-">
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Status</label>
                    <select v-model="status" class="form-control-">
                        <option v-for="status_ in status_list" :key="status_" :value="status_">{{ status_ }}</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Statut financement</label>
                    <select v-model="financial_status" class="form-control-">
                        <option v-for="financial_status_ in financial_status_list" :key="financial_status_" :value="financial_status_">{{ financial_status_ }}</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Statut CEE</label>
                    <select v-model="cee_status" class="form-control-">
                        <option v-for="cee_status_ in cee_status_list" :key="cee_status_" :value="cee_status_">{{ cee_status_ }}</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Statut MPR</label>
                    <select v-model="mpr_status" class="form-control-">
                        <option v-for="mpr_status_ in mpr_status_list" :key="mpr_status_" :value="mpr_status_">{{ mpr_status_ }}</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label class="text-black mb-2">Rapport Notes</label>
                    <select v-model="note_report" class="form-control-">
                        <option v-for="note_report_ in note_report_list" :key="note_report_" :value="note_report_">{{ note_report_ }}</option>
                    </select>
                </div>
                <div>
                    <input type="submit" class="btn text-white bg-danger px-4" value="Enregistrer">
                </div>
            </form>
        </div>

    </Template>
</template>
<script>
import Template from '../../Components/Template.vue';
import config from '../../Helpers/config';
import swal from 'sweetalert';
export default {
    name: "Create",
    components: {
        Template
    },
    data() {
        return {
            clients: [],
            installators: [],
            installator_id: "",
            client_id: "",
            ttc: "",
            postal_code: "",
            city: "",
            status: "",
            financial_status: "",
            mpr_status: "",
            note_report: "",
            cee_status: "",
        }
    },
    methods: {
        createInstallation() {
            this.axios.post(this.api, {
                "client_id": this.client_id,
                "installator_id": this.installator_id,
                "ttc": this.ttc,
                "postal_code": this.postal_code,
                "city": this.city,
                "status": this.status,
                "financial_status": this.financial_status,
                "mpr_status": this.mpr_status,
                "note_report": this.note_report,
                "cee_status": this.cee_status
            }).then((response) => {
                if (response.data.status == false) {
                    swal("Ajout d'installation", "Vérifier les informations entrées dans le formulaire", "error");
                }
                if (response.data.data.id) {
                    swal("Ajout d'installation", "L'installation a été bien ajoutée", "success");
                    this.client_id = ""
                    this.installator_id = ""
                    this.ttc = ""
                    this.postal_code = ""
                    this.city = ""
                    this.status = ""
                    this.financial_status = ""
                    this.mpr_status = ""
                    this.note_report = ""
                    this.cee_status = ""
                }

            })
            .catch(function(error) {
              console.log(error);
              swal("Ajout d'installation", "Vérifier les informations entrées dans le formulaire", "error");
            });
        }
    },
    mounted() {
        this.api = config.API_URL
        this.axios.get(this.api+"clients").then((response) => {
            this.clients = response.data.data
        })
        this.axios.get(this.api+"installators").then((response) => {
            this.installators = response.data.data
        })
        this.api = this.api+"installations/"
        this.status_list = config.status
        this.financial_status_list = config.financial_status
        this.cee_status_list = config.cee_status
        this.mpr_status_list = config.mpr_status
        this.note_report_list = config.note_report
    }
}
</script>
