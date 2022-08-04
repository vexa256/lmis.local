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
        Schema::create('passenger_travel_details', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('PID');
            $table->string('TicketNumber');
            $table->longText('PassengerRoutingAndAdditionalStationsToBeTraced');
            $table->string('FlightNumber');
            $table->string('FlightNumberOnBag');
            $table->string('TemporaryAddress(OmmitIfNotApplicable)');
            $table->string('PhoneNumberOnBag');
            $table->string('PhoneNumberAtTemporaryAddress(OmmitIfNotApplicable)');
            $table->date('DateOfLeavingTemporaryAddress(OmmitIfNotApplicable)');
            $table->string('FullAddressOnBag');
            $table->longText('LocalDeliveryArrangement');

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
        Schema::dropIfExists('passenger_travel_details');
    }
};