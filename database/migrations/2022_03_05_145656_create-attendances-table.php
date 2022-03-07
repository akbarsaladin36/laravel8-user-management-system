<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function(Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('attendance_notes');
            $table->string('attendance_start_dttm')->default(0);
            $table->string('attendance_stop_dttm')->default(0);
            $table->enum('attendance_status', ['working','completed']);
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
        Schema::dropIfExists('attendances');
    }
}
