<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('Phone')->nullable();
            $table->string('CompanyName')->nullable();
            $table->string('CompanyLogo')->nullable();
            $table->string('listed')->nullable();
            $table->string('RegistrationNumber')->nullable();
            $table->string('IncorporationCountry')->nullable();
            $table->string('PrincipleBusiness')->nullable();
            $table->string('CompanyEmail')->nullable();
            $table->string('CompanyWebsite')->nullable();
            $table->string('income')->nullable();
            $table->string('Investor')->nullable();
            $table->string('MailingAddress')->nullable();
            $table->string('Addressline1')->nullable();
            $table->string('City')->nullable();
            $table->string('Zip')->nullable();
            $table->string('State')->nullable();
            $table->string('Country')->nullable();
            $table->string('ROLES')->nullable();
            $table->string('Incorporation')->nullable();
            $table->string('role')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
