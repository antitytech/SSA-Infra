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
        Schema::create('project_overviews', function (Blueprint $table) {
            $table->id();
            $table->string('ProjectName')->nullable();
            $table->string('ProjectEmail')->nullable();
            $table->string('User_Name')->nullable();
            $table->string('ProjectType')->nullable();
            $table->string('ProjectStatus')->default(0);
            $table->string('user_id')->nullable();
            $table->integer('request_user_id')->nullable();
            $table->string('request_status')->default(0);
            $table->string('Offtaker')->nullable();
            $table->string('PPA_Status')->nullable();
            $table->string('ChoosePlatform')->nullable();
            $table->string('grid')->nullable();
            $table->string('DateCommissioning')->nullable();
            $table->string('Evacuation')->nullable();
            $table->string('SiteIdentified')->nullable();
            $table->string('ProjectStage')->nullable();
            $table->string('Country')->nullable();
            $table->string('City')->nullable();
            $table->string('Developer')->nullable();
            $table->string('Region')->nullable();
            $table->string('EPC_Contractor')->nullable();
            $table->string('EPC_Structure')->nullable();
            $table->string('Street')->nullable();
            $table->string('PostalCode')->nullable();
            $table->string('OwnershipStructure')->nullable();
            $table->string('SpecialPurposeVehicle')->nullable();
            $table->string('Image')->nullable();
            $table->string('requested')->nullable();
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
        Schema::dropIfExists('project_overviews');
    }
};
