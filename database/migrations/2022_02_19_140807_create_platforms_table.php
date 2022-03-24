<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->id();

            $table->string('Name')->nullable();
            $table->string('Type')->nullable();
            $table->string('Capacity')->nullable();
            $table->string('projectLevel')->nullable();
            $table->string('Country')->nullable();
            $table->string('Status')->nullable();
            $table->string('user_id')->nullable();

            $table->string('RevenueType')->nullable();
            $table->string('RevenueCurrency')->nullable();

            $table->string('Image')->nullable();

            $table->string('OpportunityBrief')->nullable();
            $table->string('MarketLandscape')->nullable();
            $table->string('ReasonInvest')->nullable();
            $table->string('AboutSponsor')->nullable();
            $table->string('PlatformInvestment')->nullable();

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
        Schema::dropIfExists('platforms');
    }
};
