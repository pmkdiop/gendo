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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("sourceFinancement", 120);
            $table->string("produitFinal", 60);
            $table->date("debut");
            $table->date("fin");
            $table->float("duree");
            $table->decimal("budgetTotal", 13, 2);

            // Foreign key with indexed column and cascade delete
            $table->unsignedBigInteger('activity_id')->index();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');

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
        Schema::dropIfExists('projects');
    }
};