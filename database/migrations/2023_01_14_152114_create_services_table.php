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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->unsignedBigInteger('annonce_id');
            $table->unsignedBigInteger('paiement_id');
            $table->unsignedBigInteger('avis_id');
            $table->unsignedBigInteger('materiel_id');
            $table->unsignedBigInteger('metier_id');
            $table->unsignedBigInteger('devis_id');
            $table->foreign('annonce_id')->references('id')->on('annonces');
            $table->foreign('paiement_id')->references('id')->on('paiements');
            $table->foreign('avis_id')->references('id')->on('avis');
            $table->foreign('materiel_id')->references('id')->on('materiels');
            $table->foreign('metier_id')->references('id')->on('metiers');
            $table->foreign('devis_id')->references('id')->on('devis');
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
        Schema::dropIfExists('services');
    }
};
