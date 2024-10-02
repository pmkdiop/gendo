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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('code', 6)->unique(); // Ensure code is unique
            $table->string('libelle', 120);

            $table->unsignedBigInteger('ministere_id')->nullable()->index(); // Allow ministere_id to be null and add index
            $table->foreign('ministere_id')->references('id')->on('ministeres')->onDelete('set null'); // Change cascade to set null

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
        Schema::dropIfExists('sections');
    }
};