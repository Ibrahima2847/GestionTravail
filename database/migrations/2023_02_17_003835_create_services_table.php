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
            $table->unsignedBigInteger('relation_id');
            $table->unsignedBigInteger('paiement_id');
            $table->unsignedBigInteger('avis_id');
            $table->unsignedBigInteger('devis_id');
            $table->foreign('relation_id')->references('id')->on('relations');
            $table->foreign('paiement_id')->references('id')->on('paiements');
            $table->foreign('avis_id')->references('id')->on('avis');
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
