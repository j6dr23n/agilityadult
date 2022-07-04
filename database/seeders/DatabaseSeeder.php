<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Girl;
use App\Models\Manga;
use App\Models\SubCategory;
use App\Models\User;
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
        SubCategory::factory(20)->create();
        SubCategory::factory(['category_id' => 1])->Count(50)->create();
        Video::factory(60)->create();
        User::factory(10)->create();
        Manga::factory(20)->create();
        Girl::factory(20)->create();
    }
}
