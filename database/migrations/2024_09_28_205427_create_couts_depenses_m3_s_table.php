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
        Schema::create('couts_depenses_m3_s', function (Blueprint $table) {
            $table->id();
            $table->decimal("budgetPrevisionnel", 13, 2);
            $table->decimal("montantExecute");
            $table->float("avancementPhysique");
            $table->integer("countUnitaire");
            $table->integer("quantite");
            $table->float("duree");
            $table->decimal("montant", 13, 2);

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
        Schema::dropIfExists('couts_depenses_m3_s');
    }
};