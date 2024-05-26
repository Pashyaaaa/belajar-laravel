<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Pashya',
            'username'=>'Ziu_',
            'email'=>'a@gmail.com',
            'password'=>bcrypt('12345')
        ]);

        User::factory(5)->create();
        
        Category::create([
            'category_name'=>'Programming',
            'slug'=>'programming',
        ]);
        Category::create([
            'category_name'=>'Crypto',
            'slug'=>'crypto',
        ]);
        Category::create([
            'category_name'=>'Gaming',
            'slug'=>'gaming',
        ]);
        Category::create([
            'category_name'=>'Horror',
            'slug'=>'horror',
        ]);
        Post::factory(20)->create();
    }
}
