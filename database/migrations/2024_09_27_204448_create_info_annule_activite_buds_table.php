<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_annule_activite_buds', function (Blueprint $table) {
            $table->id();
            $table->integer("annee");
            $table->integer("quantite");
            $table->string("realisation", 200);
            $table->decimal("budgetAlloue", 13, 2);

            $table->unsignedBigInteger('activite_budgetaire_id')->index(); // Add the foreign key column
            $table->foreign('activite_budgetaire_id')->references('id')->on('activite_budgetaires')->onDelete('cascade'); // Set foreign key constraint

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
        Schema::dropIfExists('info_annule_activite_buds');
    }
};