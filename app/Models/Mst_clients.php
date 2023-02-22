<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mst_clients extends Model
{
    use HasFactory;
    protected $table='mst_client';
    public $timestamps = false;
    protected $fillable = [
        'client_name',
        'first_name',
        'last_name',
        'emailid',
        'contactno',
        'address_street',
        'address_city',
        'address_state',
        'address_zip',
        'createdby',
        'createdon',
        'updatedby',
        'updatedon',
    ];

   
  
    public function user()
    {
        return $this->hasOne(User::class,'id',  'createdby');
    }
    public function clientdetails()
    {
        return $this->hasMany(mst_client_contact_details::class,'client_id',  'id');
    }
    public function tbl()
    {
        return $this->belongsTo(TblJob::class,'client_id',  'id');
    }


}
