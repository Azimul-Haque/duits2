<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('event_name');
            $table->string('registration_id')->unique();
            $table->string('team');
            $table->string('member1');
            $table->string('member2');
            $table->string('member3');
            $table->string('member4');
            $table->string('institution');
            $table->string('class');
            $table->text('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('emergencycontact');
            $table->string('image');
            $table->string('amount');
            $table->string('trxid')->nullable();
            $table->integer('payment_status');
            $table->string('card_type')->nullable();
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
        Schema::drop('applications');
    }
}
