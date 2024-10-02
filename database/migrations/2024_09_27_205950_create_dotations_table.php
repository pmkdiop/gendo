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
        Schema::create('dotations', function (Blueprint $table) {
            $table->id();
            $table->string("code", 6)->unique();
            $table->string("libelle", 150);
            $table->integer("annee");

            $table->unsignedBigInteger('activite_budgetaire_id')->index(); // Add the foreign key column
            $table->foreign('activite_budgetaire_id')->references('id')->on('activite_budgetaires')->onDelete('cascade'); // Set foreign key constraint

            $table->unsignedBigInteger('task_id'); // Add the foreign key column
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade'); // Set foreign key constraint

            $table->unsignedBigInteger('rubrique_id'); // Add the foreign key column
            $table->foreign('rubrique_id')->references('id')->on('rubriques')->onDelete('cascade'); // Set foreign key constraint

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
        Schema::dropIfExists('dotations');
    }
};