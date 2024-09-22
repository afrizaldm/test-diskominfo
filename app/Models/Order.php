<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    // protected $keyType = 'string';

    protected $fillable = [
    ];

    public function detail_orders() {
        return $this->hasMany(DetailOrder::class,  'order_id', 'id');
    }
}
