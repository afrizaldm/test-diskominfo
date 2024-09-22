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
        'name',
        'price',
        'quantity',
        'order_id',
        'product_id',
    ];

    public function users() {
        return $this->hasMany(User::class,  'city_id', 'id');
    }
}
