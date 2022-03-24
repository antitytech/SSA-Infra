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
        Schema::create('project_operations', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('MaintenanceYearlyCosts')->nullable();
            $table->string('OverheadYearlyCosts')->nullable();
            $table->string('OM_ContractInPlace')->nullable();
            $table->string('OM_YearlyCosts')->nullable();
            $table->string('OM_Currency')->nullable();
            $table->string('OM_Contractor')->nullable();
            $table->string('CommentsOMCosts')->nullable();
            $table->string('OperationalRisks')->nullable();
            $table->string('ThirdParty')->nullable();
            $table->string('Yield_PerformancesRisks')->nullable();
            $table->string('InsuranceCosts')->nullable();
            $table->string('InsuranceCurrency')->nullable();
            $table->string('CommentsAboutInsuranceCosts')->nullable();
            $table->string('OM_EscalationRate')->nullable();
            $table->string('InsurerName')->nullable();
            $table->string('CommentsRegardingOM_Insurance')->nullable();
            $table->string('WarrantyEndDate')->nullable();
            $table->string('ItemsNotWarranty')->nullable();
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
        Schema::dropIfExists('project_operations');
    }
};
