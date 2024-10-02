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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('prenom', 70);
            $table->string('nom', 60);
            $table->string('nomUtilisateur', 60)->unique();
            $table->string('email', 120)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->timestamp('dateDernierLogin')->nullable();
            $table->string('avatar')->nullable();
            $table->string('actif', 5);

            $table->unsignedBigInteger('ministere_id')->nullable(); // Add the foreign key column
            $table->foreign('ministere_id')->references('id')->on('ministeres')->onDelete('set null'); // Set foreign key constraint

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};