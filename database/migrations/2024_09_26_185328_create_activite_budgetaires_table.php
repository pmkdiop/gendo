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
        Schema::create('activite_budgetaires', function (Blueprint $table) {
            $table->id();
            $table->string("produitService", 100);
            $table->integer("quantite");
            $table->string("uniteIndicateur", 30);
            $table->string("realisation", 100);
            $table->float("volume");
            $table->float("facteurAjustement");
            $table->string("unit", 30);
            $table->decimal("budgetAloue", 13, 2);
            $table->string("type", 30);
            $table->string("maturite", 30);

            // Foreign key for activity_id referencing the activities table
            $table->unsignedBigInteger('activity_id')->index();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');

            // Self-referencing foreign key for parent-child relationship
            $table->unsignedBigInteger('activite_budgetaire_parent_id')->nullable(); // Allow null for top-level activities
            $table->foreign('activite_budgetaire_parent_id')->references('id')->on('activite_budgetaires')->onDelete('cascade');
            $table->index('activite_budgetaire_parent_id'); // Index for performance optimization

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
        Schema::dropIfExists('activite_budgetaires');
    }
};