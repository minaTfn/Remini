<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    /**
     * @var array
     */
    protected $toTruncate = ['cities', 'countries', 'users', 'delivery_methods', 'payment_methods', 'contact_methods'];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        $this->call([
            CitiesTableSeeder::class,
            CountriesTableSeeder::class,
            UsersTableSeeder::class,
            DeliveryMethodsTableSeeder::class,
            PaymentMethodsTableSeeder::class,
            ContactMethodsTableSeeder::class,
        ]);
    }
}
