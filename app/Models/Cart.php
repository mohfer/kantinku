<?php

namespace App\Models;

use App\Models\User;
use App\Models\CartItem;
use App\Models\Merchant;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
