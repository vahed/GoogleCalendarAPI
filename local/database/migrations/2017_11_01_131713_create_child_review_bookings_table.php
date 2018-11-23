<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildReviewBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_review_bookings', function (Blueprint $table) {
            $table->string('title');
            $table->string('teacher_name');          
            $table->dateTime('start');
            $table->dateTime('end');
			$table->string('tievent_type');
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
        Schema::dropIfExists('userchild_review_bookings');
    }
}
