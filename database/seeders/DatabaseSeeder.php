<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Foro;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);


        Curso::factory(10)->create();

        Video::factory(50)->create();

        Foro::factory(20)->create();
    }
}
