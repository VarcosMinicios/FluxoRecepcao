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
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('cpf');
            $table->string('rg')->nullable();
            $table->string('prontuario')->nullable();
            $table->string('name');
            $table->string('mother');
            $table->string('cns');
            $table->date('born_day');
            $table->string('gender');
            $table->string('breed')->nullable();
            $table->string('nationality')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('cep');
            $table->string('state');
            $table->string('city');
            $table->string('district');
            $table->string('adress_type');
            $table->string('adress');
            $table->string('number');
            $table->string('reference')->nullable();
            $table->string('city_code')->nullable();
            $table->string('complement')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
};
