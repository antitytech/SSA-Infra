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
            $table->string('name');
            $table->string('email');
            $table->string('Phone');
            $table->string('Title');
            $table->string('DOB');
            $table->string('TaxResidence');
            $table->string('CountryResidence');
            $table->string('PrimaryCitizenship');
            $table->string('MAILINGADDRESS');
            $table->string('Addressline1');
            $table->string('Addressline2');
            $table->string('City');
            $table->string('Zip');
            $table->string('State');
            $table->string('Country');
            $table->string('ROLES');
            $table->string('Passport');
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
