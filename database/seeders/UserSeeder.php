<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "lorem",
            'email' => '@LoremIpsum28',
            'password' => bcrypt('HolaMundo28'),
            'image' => 'assets/user.png',
            'credit' => 9999,
            'days' => Carbon::now()->addDays(9999)
        ])->assignRole('Owner');
    }
}
