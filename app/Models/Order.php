<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Merchant;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
