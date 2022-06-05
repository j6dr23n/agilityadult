<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Leak;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Leak::factory(50)->create();
        Category::factory(30)->create();
        Video::factory(60)->create();
        User::factory(10)->create();
    }
}
