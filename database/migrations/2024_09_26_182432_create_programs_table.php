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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string("code", 10)->unique(); // Unique program code
            $table->string("libelle", 120);
            $table->longText("description")->nullable();
            $table->string("types", 100)->nullable();
            $table->date("dateDebut")->nullable();
            $table->date("dateFin")->nullable();

            $table->unsignedBigInteger('section_id')->nullable()->index(); // Nullable and indexed foreign key
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null'); // Set null on delete

            $table->unsignedBigInteger('ministere_id')->nullable()->index(); // Nullable and indexed foreign key
            $table->foreign('ministere_id')->references('id')->on('ministeres')->onDelete('set null'); // Set null on delete

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
        Schema::dropIfExists('programs');
    }
};