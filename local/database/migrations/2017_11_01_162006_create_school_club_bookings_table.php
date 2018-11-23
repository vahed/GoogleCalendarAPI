<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolClubBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_club_bookings', function (Blueprint $table) {
            $table->increments('id');
			$table->string('session_name');
			$table->string('session1')->default('none');
			$table->string('session2')->default('none');
			$table->string('child_name');
			$table->string('d_o_b');
			$table->string('parent_name');
			$table->string('phone');
			$table->string('email');
			$table->string('payment');
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
        Schema::dropIfExists('school_club_bookings');
    }
}
