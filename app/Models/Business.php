<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes   ;
    protected $table='business';

    protected $dates = ['isdeleted'];
    const DELETED_AT = 'isdeleted';
    public function warehouseDetail(){
        return $this->hasMany(BusinessWarehouseDetail::class,'id',  'business_id');

    }
}
