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
        Schema::create('couts_depenses_m2_s', function (Blueprint $table) {
            $table->id();
            $table->string("unite", 255);
            $table->integer("quantite");
            $table->integer("quantitePlannifie");
            $table->integer("quantiteReaslise");
            $table->float("coutUnitaire");
            $table->float("countUnitairePlannifie");
            $table->float("countUnitaireRealise");
            $table->float("affectationParAnne");
            $table->float("pourcentageAffectation");
            $table->float("quantiteExtrantsParRessource");
            $table->text("observationHypothese");

            $table->unsignedBigInteger('couts_depense_id')->index(); // Add the foreign key column
            $table->foreign('couts_depense_id')->references('id')->on('couts_depenses')->onDelete('cascade'); // Set foreign key constraint

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
        Schema::dropIfExists('couts_depenses_m2_s');
    }
};