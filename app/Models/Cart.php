<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    
    public function cartItems(): HasMany {
        return $this->hasMany(CartItem::class);
    }
    
    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }
}
