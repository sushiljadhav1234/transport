<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mst_clients;

class TblJob extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='tbl_jobs';

    public function client(){
        return $this->hasOne(Mst_clients::class,'id',  'client_id');  
    }
}
