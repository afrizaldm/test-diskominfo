<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Order;
use App\Models\DetailOrder;

class DetailOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $key => $value) {

            $count = rand(1, 3);

            for ($i = 0; $i < $count; $i++) {

                $randomProduct = $products->random();

                DetailOrder::factory(3)->create([
                    'name' => $randomProduct->name,
                    'price' => $randomProduct->price,
                    'order_id' => $value->id,
                    'product_id' => $randomProduct->id,
                ]);
            }
        }
    }
}
