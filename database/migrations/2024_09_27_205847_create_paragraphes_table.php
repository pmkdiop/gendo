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
        Schema::create('paragraphes', function (Blueprint $table) {
            $table->id();
            $table->string("code", 6)->unique();
            $table->longText("intitule");

            $table->unsignedBigInteger('article_id')->index(); // Add the foreign key column
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade'); // Set foreign key constraint

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
        Schema::dropIfExists('paragraphes');
    }
};