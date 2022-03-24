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
        Schema::create('project_financials', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('TotalProjectCost')->nullable();
            $table->string('TotalProjectCurrency')->nullable();
            $table->string('ProjectCostSpentDate')->nullable();
            $table->string('ProjectCurrencySpentDate')->nullable();
            $table->string('ProjectIRRlifecycle')->nullable();
            $table->string('ProjectIRRDate')->nullable();
            $table->string('IRRProductionAssumption')->nullable();
            $table->string('AverageRevenuesMonth')->nullable();
            $table->string('AverageRevenuesMonthCurrency')->nullable();
            $table->string('TypeDepreciation')->nullable();
            $table->string('DepreciationTerm')->nullable();
            $table->string('RemainingValue')->nullable();
            $table->string('RemainingValueCurrency')->nullable();
            $table->string('Comments')->nullable();
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
        Schema::dropIfExists('project_financials');
    }
};
