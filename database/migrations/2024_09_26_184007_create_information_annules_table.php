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
        Schema::create('information_annules', function (Blueprint $table) {
            $table->id();
            $table->integer("annee");
            $table->decimal("budgetAloue", 13, 2);
            $table->decimal("plafondBudgetaire", 13, 2);
            $table->decimal("tauxCroissanceRel", 13, 2);
            $table->decimal("tauxInflation", 5, 2); // Changed from float to decimal for precision

            $table->unsignedBigInteger('program_id')->index(); // Indexed foreign key
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade'); // Foreign key with cascading delete

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
        Schema::dropIfExists('information_annules');
    }
};