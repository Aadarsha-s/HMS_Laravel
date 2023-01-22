<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('found_item', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('room_number');
            $table->string('found_date');
            $table->string('description');            
            $table->string('found_by');
            $table->string('reported_to');
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
        Schema::dropIfExists('found_item');
    }
}
