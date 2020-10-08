<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactMethodsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $contactMethods = [
            ['id' => 1, 'title' => 'Email', 'name' => 'email', 'title_fa' => 'ایمیل','description'=>''],
            ['id' => 2, 'title' => 'Cellphone', 'name' => 'cell', 'title_fa' => 'موبایل','description'=>''],
        ];

        DB::table('contact_methods')->insert($contactMethods);
    }
}
