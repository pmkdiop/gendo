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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string("code", 6)->unique(); // Unique code for each action
            $table->string("libelle", 120);

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
        Schema::dropIfExists('actions');
    }
};