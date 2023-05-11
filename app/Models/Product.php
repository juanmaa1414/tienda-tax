<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    
    public $fillable = [
        'id',
        'name',
        'img',
        'unit_price',
        'created_at'
    ];
}
