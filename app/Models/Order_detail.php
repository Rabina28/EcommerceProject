<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','product_quantity', 'product_price',
        'total'
    ];
    public function products()
    {
        return $this->hasOne(Product::class);
    }
    public function customers()
    {
        return $this->hasOne(Customer::class);
    }
}
