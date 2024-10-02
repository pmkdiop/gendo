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
        Schema::create('couts_depenses', function (Blueprint $table) {
            $table->id();
            $table->string("libelle", 200);
            $table->longText("description");
            $table->integer("annee");
            $table->string("type", 100);

            $table->unsignedBigInteger('dotation_id')->index(); // Add the foreign key column
            $table->foreign('dotation_id')->references('id')->on('dotations')->onDelete('cascade'); // Set foreign key constraint

            $table->unsignedBigInteger('source_financement_id')->nullable()->index(); // Add the foreign key column
            $table->foreign('source_financement_id')->references('id')->on('source_financements')->onDelete('set null'); // Set foreign key constraint


            $table->unsignedBigInteger('rubrique_id')->index(); // Add the foreign key column
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
        Schema::dropIfExists('couts_depenses');
    }
};