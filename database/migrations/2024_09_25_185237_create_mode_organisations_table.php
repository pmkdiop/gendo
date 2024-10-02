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
        Schema::create('mode_organisations', function (Blueprint $table) {
            $table->id();
            $table->string("code", 6)->unique();
            $table->string("libelle", 120);

            $table->unsignedBigInteger('methode_costing_id')->index(); // Add the foreign key column
            $table->foreign('methode_costing_id')->references('id')->on('methode_costings')->onDelete('cascade'); // Set foreign key constraint

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
        Schema::dropIfExists('mode_organisations');
    }
};