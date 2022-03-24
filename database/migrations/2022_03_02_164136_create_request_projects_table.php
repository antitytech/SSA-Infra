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
        Schema::create('request_projects', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('role')->nullable();
            $table->string('nda_developer')->default(2);
            $table->string('nda_investor')->default(2);
            $table->string('request_status_inves')->default(0);
            $table->string('request_status_dev')->default(0);
            $table->string('project_user_id')->nullable();
            $table->string('project_user_role')->nullable();
            $table->string('projectid')->nullable();
            $table->string('status')->nullable();
            $table->string('ProjectName')->nullable();
            $table->string('ProjectEmail')->nullable();
            $table->string('ProjectType')->nullable();
            $table->string('ProjectStatus')->default(0);
            $table->integer('request_user_id')->nullable();
            $table->string('request_status')->default(0);
            $table->string('request_status_admin')->default(0);
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
        Schema::dropIfExists('request_projects');
    }
};
