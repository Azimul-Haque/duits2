<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member_id')->unique();
            $table->string('name');
            $table->string('dept');
            $table->string('hall');
            $table->integer('residency');
            $table->string('session');
            $table->string('email');
            $table->string('contact1');
            $table->string('contact2');
            $table->date('dob');
            $table->string('bloodgroup');

            $table->string('father');
            $table->string('fcontact')->nullable();
            $table->string('mother');
            $table->string('mcontact')->nullable();

            $table->string('ssc');
            $table->string('ssc_passing_year');
            $table->string('hsc');
            $table->string('hsc_passing_year');

            $table->string('cocurricular');
            $table->string('hobby');
            $table->text('reason');

            $table->string('blogs');
            $table->string('othersocieties');

            $table->string('image');

            $table->string('payment_method');
            $table->string('trxid')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('members');
    }
}
