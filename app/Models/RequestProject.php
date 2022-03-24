<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_status_admin'
   ];
}
