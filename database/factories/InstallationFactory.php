<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Installation>
 */
class InstallationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ["Prêt pour installation", "Fin de traitement", "Traitement en cours"];
        $financial_status = ["Manque de pièces", "Virement effectué", "Attente deblocage de Fonds"];
        $cee_status = ["AH non signée", "Dépôt validé", "Dépôt prêt"];
        $mpr_status = ["Demande de solde effectuée", "Solde accepté", "Attente de validation"];
        $note_report = ["Confirmé", "Non confirmé"];

        $clients = User::where("role", "CUSTOMER")->get();
        $installators = User::where("role", "INSTALLATOR")->get();

        return [
            'client_id' => $clients[rand(0, count($clients))],
            'postal_code' => fake()->randomNumber(),
            'city' => fake()->city(),
            'installator_id' => $installators[rand(0, count($installators))],
            "ttc" => fake()->randomNumber() + 0.01*rand(0,9),
            "status" => $status[rand(0, count($status) - 1)],
            "financial_status" => $financial_status[rand(0, count($financial_status) - 1)],
            "cee_status" => $cee_status[rand(0, count($cee_status) - 1)],
            "mpr_status" => $mpr_status[rand(0, count($mpr_status) - 1)],
            "note_report" => $note_report[rand(0, count($note_report) - 1)]
        ];
    }
}
