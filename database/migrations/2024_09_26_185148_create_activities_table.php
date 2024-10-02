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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string("code", 6)->unique();
            $table->string("libelle", 120);

            $table->unsignedBigInteger('action_id')->nullable();
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('set null');
            $table->index('action_id');

            $table->unsignedBigInteger('chapter_id')->nullable();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('set null');
            $table->index('chapter_id');

            $table->unsignedBigInteger('mode_organisation_id')->nullable();
            $table->foreign('mode_organisation_id')->references('id')->on('mode_organisations')->onDelete('set null');
            $table->index('mode_organisation_id');

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
        Schema::dropIfExists('activities');
    }
};