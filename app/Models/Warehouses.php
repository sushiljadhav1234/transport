<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    use HasFactory;

    protected $table='warehouse';

    protected $fillable = [
        'warehouse',
        'address_street',
        'address_city ',
        'address_state',
        'address_zip',
        'contact_person_details',
        'warehouse_type',
        'createdby',
        'updatedby',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id', 'warehouse_id');
    }
}
