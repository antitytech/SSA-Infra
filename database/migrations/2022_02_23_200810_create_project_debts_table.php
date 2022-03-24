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
        Schema::create('project_debts', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('ShareOfProject')->nullable();
            $table->string('RepaymentSchedule')->nullable();
            $table->string('FixedRate')->nullable();
            $table->string('LenderName')->nullable();
            $table->string('DebtType')->nullable();
            $table->string('MinimumDSCR')->nullable();
            $table->string('LoanTerm')->nullable();
            $table->string('DebtDescription')->nullable();
            $table->string('StructureComments')->nullable();
            $table->string('Currency')->nullable();
            $table->string('InterestRate')->nullable();
            $table->string('Amount')->nullable();
            $table->string('Comments')->nullable();
            $table->string('PrincipalCurrency')->nullable();
            $table->string('PrincipalAmount')->nullable();

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
        Schema::dropIfExists('project_debts');
    }
};
