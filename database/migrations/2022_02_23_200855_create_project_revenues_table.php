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
        Schema::create('project_revenues', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectId')->nullable();
            $table->string('ProjectName')->nullable();
            // Revenue
            $table->string('Revenue2022')->nullable();
            $table->string('Revenue2021')->nullable();
            $table->string('Revenue2020')->nullable();
            $table->string('Revenue2019')->nullable();
            $table->string('Revenue2018')->nullable();

            // OperationalCosts
            $table->string('OperationalCosts2022')->nullable();
            $table->string('OperationalCosts2021')->nullable();
            $table->string('OperationalCosts2020')->nullable();
            $table->string('OperationalCosts2019')->nullable();
            $table->string('OperationalCosts2018')->nullable();

            // Depreciation
            $table->string('Depreciation2022')->nullable();
            $table->string('Depreciation2021')->nullable();
            $table->string('Depreciation2020')->nullable();
            $table->string('Depreciation2019')->nullable();
            $table->string('Depreciation2018')->nullable();

            // Tax
            $table->string('Tax2022')->nullable();
            $table->string('Tax2021')->nullable();
            $table->string('Tax2020')->nullable();
            $table->string('Tax2019')->nullable();
            $table->string('Tax2018')->nullable();

            // Profit
            $table->string('Profit2022')->nullable();
            $table->string('Profit2021')->nullable();
            $table->string('Profit2020')->nullable();
            $table->string('Profit2019')->nullable();
            $table->string('Profit2018')->nullable();

            // Capital
            $table->string('Capital2022')->nullable();
            $table->string('Capital2021')->nullable();
            $table->string('Capital2020')->nullable();
            $table->string('Capital2019')->nullable();
            $table->string('Capital2018')->nullable();

            // Cashflow
            $table->string('Cashflow2022')->nullable();
            $table->string('Cashflow2021')->nullable();
            $table->string('Cashflow2020')->nullable();
            $table->string('Cashflow2019')->nullable();
            $table->string('Cashflow2018')->nullable();

            // Comments
            $table->string('Comments2022')->nullable();
            $table->string('Comments2021')->nullable();
            $table->string('Comments2020')->nullable();
            $table->string('Comments2019')->nullable();
            $table->string('Comments2018')->nullable();
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
        Schema::dropIfExists('project_revenues');
    }
};
