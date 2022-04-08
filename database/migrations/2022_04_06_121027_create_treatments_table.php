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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('id_patient');
            $table->string('attendance_code');
            $table->string('date');
            $table->string('hour');
            $table->string('doctor');
            $table->string('initial_state');
            $table->string('blood_pressure');
            $table->string('temperature');
            $table->string('heart_rate');
            $table->string('respiratory_frequency');
            $table->string('weight');
            $table->string('emotional_state');
            $table->string('consciousness');
            $table->string('locomotion');
            $table->longText('motor_alteration')->nullable();
            $table->longText('speaking')->nullable();
            $table->longText('allergies')->nullable();
            $table->longText('obs');
            $table->longText('medical_conduct')->default('');
            $table->longText('medicins')->nullable();
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
        Schema::dropIfExists('treatments');
    }
};
