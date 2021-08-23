<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname',
        'email ', 'phone', 'password', 'address', 'city','status'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function order_details()
    {
        return $this->hasMany(Order_detail::class);
    }
}
