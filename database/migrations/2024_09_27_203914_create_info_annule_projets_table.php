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
        Schema::create('info_annule_projets', function (Blueprint $table) {
            $table->id();
            $table->integer("annee");
            $table->float("travailRestant");
            $table->decimal("budgetDepense", 13, 2);

            $table->unsignedBigInteger('project_id')->index(); // Add the foreign key column
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade'); // Set foreign key constraint

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
        Schema::dropIfExists('info_annule_projets');
    }
};