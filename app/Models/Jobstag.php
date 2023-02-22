<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobstag extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='mst_jobtags';
    public $timestamps = false;
    protected $fillable = [
    
        'tagname',
        'createdby',
        'createdon',
        'updatedby',
        'updatedon',
    ];

   
}
