<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    // protected $keyType = 'string';

    protected $fillable = [
        'name',
        'price',
        'stock',
        'sold',
    ];

    public function users() {
        return $this->hasMany(User::class,  'city_id', 'id');
    }
}
