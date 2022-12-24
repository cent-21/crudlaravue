<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign("client_id")->references("id")->on("users")->onDelete('cascade');
            $table->string("postal_code");
            $table->string("city");
            $table->unsignedBigInteger('installator_id');
            $table->foreign("installator_id")->references("id")->on("users")->onDelete('cascade');
            $table->double("ttc");
            $table->enum("status", ["Prêt pour installation", "Fin de traitement", "Traitement en cours"]);
            $table->enum("financial_status", ["Manque de pièces", "Virement effectué", "Attente deblocage de Fonds"]);
            $table->enum("cee_status", ["AH non signée", "Dépôt validé", "Dépôt prêt"]);
            $table->enum("mpr_status", ["Demande de solde effectuée", "Solde accepté", "Attente de validation"]);
            $table->enum("note_report", ["Confirmé", "Non confirmé"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installations');
    }
};
