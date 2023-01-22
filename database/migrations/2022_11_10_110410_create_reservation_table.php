<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_type');
            $table->unsignedBigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->string('room_type');
            $table->string('room_number');
            $table->string('first_name');
            $table->string('middle_name')->nullable();            
            $table->string('last_name');
            $table->string('address');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('country')->nullable();
            $table->string('request_type');
            $table->string('special_request_rate');
            $table->string('room_plan');
            $table->string('room_plan_rate');
            $table->string('payment_mode');
            $table->string('total_rate');
            $table->string('arrival_date');
            $table->string('arrival_time');
            $table->string('departure_date');
            $table->string('departure_time');
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
        Schema::dropIfExists('reservation');
    }
}
