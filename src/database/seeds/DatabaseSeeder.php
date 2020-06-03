<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Shop;
use App\Models\Record;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
    }
}
