<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $mina = DB::table('users')->where('email', 'mina.taftian71@gmail.com')->first();
        if (!$mina) {
            DB::table('users')->insert([
                'name' => 'Mina Taftian',
                'email' => 'mina.taftian71@gmail.com',
                'password' => '$2y$10$OGoWDw03JPLcw8kgbG8HYOSkP45HCIgLazRpWNUcDrJbdWSXuugYO',
                'status' => 1,
                'role' => 1,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ]);
        }

        User::factory()->times(50)->create([
//            'name'=>'John Doe' // overwrite the parameter with default value
        ]);


    }
}
