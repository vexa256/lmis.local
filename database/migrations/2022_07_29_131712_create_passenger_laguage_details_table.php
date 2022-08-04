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
        Schema::create('passenger_laguage_details', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('ComplaintStatus')->default('Pending');
            $table->string('ComplaintID');
            $table->string('PID');
            $table->string('PlaceWhereBagWasLastSeen');
            $table->string('DestinationOnBaggageTag');
            $table->string('TagNumber(OmmitIfUnknown)')->nullable();
            $table->string('ColorType(OmmitIfUnknown)')->nullable();
            $table->string('BrandNameOfBaggage(OmmitIfUnknown)')->nullable();
            $table->longText('ListThreeDistinctiveItemsInTheBag');
            $table->date('Date');

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
        Schema::dropIfExists('passenger_laguage_details');
    }
};