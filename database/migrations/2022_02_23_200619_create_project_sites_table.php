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
        Schema::create('project_sites', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('SiteAccessibleTruck')->nullable();
            $table->string('logistics')->nullable();
            $table->string('SiteArea')->nullable();
            $table->string('SiteUnit')->nullable();
            $table->string('SiteMainUsage')->nullable();
            $table->string('ContractSigned')->nullable();
            $table->string('SiteOwnerPPAoff_taker')->nullable();
            $table->string('SiteOwnerPayment')->nullable();
            $table->string('SiteContractType')->nullable();
            $table->string('SiteCostPerYear')->nullable();
            $table->string('SiteCurrency')->nullable();
            $table->string('DurationLease')->nullable();
            $table->string('SiteAccess')->nullable();
            $table->string('Address')->nullable();
            $table->string('CommentsSite')->nullable();
            $table->string('RoadSurvey')->nullable();
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
        Schema::dropIfExists('project_sites');
    }
};
