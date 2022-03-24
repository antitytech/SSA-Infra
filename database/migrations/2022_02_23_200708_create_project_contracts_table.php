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
        Schema::create('project_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('BuildingPermitsAvailable')->nullable();
            $table->string('EnvironmentalPermitsAvailable')->nullable();
            $table->string('InterconnectionPermitsAvailable')->nullable();
            $table->string('GeneralRisks')->nullable();
            $table->string('TransitRisks')->nullable();
            $table->string('Construction_ErectionRisks')->nullable();
            $table->string('ThirdPartyLiability')->nullable();
            $table->string('ProfessionalIndemnity')->nullable();
            $table->string('InsuranceCosts')->nullable();
            $table->string('InsuranceCostsCurrency')->nullable();
            $table->string('CommentAboutInsurance')->nullable();
            $table->string('ProjectDeveloperEPC')->nullable();
            $table->string('EPC_Contract')->nullable();
            $table->string('ProcurementContractor')->nullable();
            $table->string('EngineeringContractor')->nullable();
            $table->string('ConstructionContractor')->nullable();
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
        Schema::dropIfExists('project_contracts');
    }
};
