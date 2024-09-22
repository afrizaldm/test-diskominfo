<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';

    protected $primaryKey = 'id';

    // protected $keyType = 'string';

    protected $fillable = [
        'price',
        'quantity',
        'order_id',
        'product_id',
    ];

    public function order() {
        return $this->hasOne(Order::class,  'id', 'order_id');
    }

    public function product() {
        return $this->hasOne(Product::class,  'id', 'product_id');
    }
}
