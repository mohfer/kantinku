<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model
{
    use Sluggable, SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'open_time' => 'datetime:H:i',
        'close_time' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
