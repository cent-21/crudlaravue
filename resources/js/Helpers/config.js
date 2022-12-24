let exports = {}

exports.API_URL = "http://127.0.0.1:8000/api/"

exports.status = ["Prêt pour installation", "Fin de traitement", "Traitement en cours"]
exports.financial_status = ["Manque de pièces", "Virement effectué", "Attente deblocage de Fonds"]
exports.cee_status = ["AH non signée", "Dépôt validé", "Dépôt prêt"]
exports.mpr_status = ["Demande de solde effectuée", "Solde accepté", "Attente de validation"]
exports.note_report = ["Confirmé", "Non confirmé"]


export default exports;