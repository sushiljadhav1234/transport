<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mst_client_contact_details extends Model
{
    use HasFactory;
    protected $table = 'mst_client_contact_details';
    public $timestamps = false;
    protected $fillable = [
        'client_id',
        'name',
        'last_name',
        'contactno',
        'email',
        'isactive',
        'createdby',
        'createdon',
        'updatedby',
        'updatedon',
       
    ];


    public function client()
    {
        return $this->belongsTo(Mst_clients::class,'id', 'client_id');
    }
}
