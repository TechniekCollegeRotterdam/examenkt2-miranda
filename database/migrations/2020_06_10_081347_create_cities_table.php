<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            //ik geef een naam mee als string
            $table->string('name', 100);
            //ik geef een beschrijving mee als text
            $table->text('description');

            //hier geef ik de foreign key province mee als relatie
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onDelete('restrict') //wanneer je een provincie verwijderd en er staat nog een stad aan gekoppeld krijg je een foutmelding
                ->onUpdate('restrict');

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
        Schema::dropIfExists('cities');
    }
}
