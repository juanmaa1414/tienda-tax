<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
