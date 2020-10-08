<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $paymentMethods = [
            ['id' => 1, 'title' => 'Before', 'description' => '', 'title_fa' => 'قبل از دریافت کالا'],
            ['id' => 2, 'title' => 'After', 'description' => '', 'title_fa' => 'بعد از دریافت کالا'],
        ];

        DB::table('payment_methods')->insert($paymentMethods);
    }
}
