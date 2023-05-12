<?php

namespace Database\Seeders;
use App\Models\Commend;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Commend::truncate();
        Commend::factory(20)->create();
    }
}
