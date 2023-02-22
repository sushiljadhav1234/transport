<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessWarehouseDetail extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    public $timestamps= false;
    protected $dates = ['isdeleted'];
    const DELETED_AT = 'isdeleted';


    public function business(){
        return $this->belongsTo(Business::class,'business_id',  'id');

    }

}
