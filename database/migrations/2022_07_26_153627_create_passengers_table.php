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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('ComplaintID');
            $table->string('PID');
            $table->string('FullName');
            $table->string('PassportNumber');
            $table->string('Email');
            $table->string('PermanentAddress');
            $table->string('TemporaryAddress')->nullable();
            $table->string('PhoneNumber');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('passengers');
    }
};