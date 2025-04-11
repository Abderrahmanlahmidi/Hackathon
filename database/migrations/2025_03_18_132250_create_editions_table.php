<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->string('lieu');
            $table->integer('theme_id');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->integer('regle_id');
            $table->foreign('regle_id')->references('id')->on('regles');
            $table->integer('inscription_id');
            $table->foreign('inscription_id')->references('id')->on('inscriptions');
            $table->integer('equipe_id');
            $table->foreign('equipe_id')->references('id')->on('equipes');
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
        Schema::dropIfExists('editions');
    }
};
