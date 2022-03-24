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
        Schema::create('project_taxes', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('CorporateIncomeTax')->nullable();
            $table->string('ImportDutiesVAT')->nullable();
            $table->string('Schedule')->nullable();
            $table->string('WithholdingTax')->nullable();
            $table->string('OtherTax')->nullable();
            $table->string('DepreciationTerm')->nullable();
            $table->string('DepreciationTermYear')->nullable();
            $table->string('VAT_GST_Revenue')->nullable();
            $table->string('TaxesComments')->nullable();
            $table->string('VAT_GST_Expense')->nullable();
            $table->string('InitialAllowance')->nullable();
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
        Schema::dropIfExists('project_taxes');
    }
};
