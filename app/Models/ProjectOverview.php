<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOverview extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProjectName', 'ProjectType', 'ProjectStatus',
        'user_id', 'Offtaker', 'PPA_Status',
        'ChoosePlatform', 'grid', 'DateCommissioning',
        'Evacuation', 'SiteIdentified', 'ProjectStage',
        'Country', 'City', 'Developer',
        'Region', 'EPC_Contractor', 'EPC_Structure',
        'Street', 'PostalCode', 'OwnershipStructure',
        'SpecialPurposeVehicle', 'Image', 'requested',
   ];

   public function request()
   {
       return $this->hasMany(RequestProject::class, 'user_id', 'id');
   }
}
