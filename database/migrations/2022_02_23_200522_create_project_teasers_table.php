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
        Schema::create('project_teasers', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('OpportunityBrief')->nullable();
            $table->string('MarketLandscape')->nullable();
            $table->string('ReasonIinvest')->nullable();
            $table->string('AboutSponsor')->nullable();
            $table->string('TeaserOffTaker')->nullable();
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
        Schema::dropIfExists('project_teasers');
    }
};
