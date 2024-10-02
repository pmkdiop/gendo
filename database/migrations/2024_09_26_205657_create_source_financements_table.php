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
        Schema::create('source_financements', function (Blueprint $table) {
            $table->id();
            $table->string("code", 6)->unique()->index();
            $table->string("code1", 6);
            $table->string("libelle1", 60);
            $table->string("code2", 6);
            $table->string("libelle2", 60);
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
        Schema::dropIfExists('source_financements');
    }
};