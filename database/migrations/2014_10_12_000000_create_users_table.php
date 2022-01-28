<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->string('linkedin_id')->nullable();
            $table->string('image')->nullable();
            $table->string('otp')->nullable();
            $table->string('v_otp')->default(0);
            $table->string('status')->default(1);
            $table->string('profile')->default(0);
            $table->string('response')->default(0);
            $table->string('Phone')->nullable();
            $table->string('Title')->nullable();
            $table->string('DOB')->nullable();
            $table->string('TaxResidence')->nullable();
            $table->string('CountryResidence')->nullable();
            $table->string('PrimaryCitizenship')->nullable();
            $table->string('MAILINGADDRESS')->nullable();
            $table->string('Addressline1')->nullable();
            $table->string('Addressline2')->nullable();
            $table->string('City')->nullable();
            $table->string('Zip')->nullable();
            $table->string('State')->nullable();
            $table->string('Country')->nullable();
            $table->string('ROLES')->nullable();
            $table->string('Passport')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
