<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryMethodsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $deliveryMethods = [
            ['id' => 1, 'title' => 'Delivery', 'description' => '', 'title_fa' => 'تحویل'],
            ['id' => 2, 'title' => 'Purchase and Delivery', 'description' => '', 'title_fa' => 'خرید و تحویل'],
        ];

        DB::table('delivery_methods')->insert($deliveryMethods);
    }
}
