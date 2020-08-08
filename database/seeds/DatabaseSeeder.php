<?php

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();
        
        // $this->call(UserSeeder::class);
        factory('App\User', 10)->create()->each(function($user) {
            $user->posts()->save(factory('App\Post')->make());
        }) ;
    }
}
