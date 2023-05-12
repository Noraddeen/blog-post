<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Commend;
use App\Models\Post;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->delete();
         DB::table('users')->delete();
         DB::table('categories')->delete();
//         $user = User::create([ 'name' => 'noraddin','email' => 'sjfasjl', 'password' => 'sdfsdf']);
         User::factory(7)->create();
         //Category::factory(7)->create();
         Post::factory(15)->create();
         Commend::factory(20)->create();
    }
}
