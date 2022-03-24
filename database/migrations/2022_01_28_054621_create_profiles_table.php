<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
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
            $table->string('role')->nullable();
            $table->string('Passport')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
