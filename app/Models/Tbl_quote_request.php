<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_quote_request extends Model
{
    use HasFactory;
    protected $table = 'tbl_quote_request';
    public $timestamps = false;
    protected $guarded = [];
}
