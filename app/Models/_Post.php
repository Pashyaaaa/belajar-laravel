<?php

namespace App\Models;

class Post_
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Komik",
            "slug" => "judul-post-pertama",
            "author" => "Octavian Pashya Ramadhan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolorum labore praesentium, eum alias quia hic itaque repudiandae deleniti explicabo ullam, magnam nemo molestiae? Sapiente ut aliquid perspiciatis porro magnam minus dolorum quaerat facilis numquam officia! Porro ad est consequatur quis nesciunt natus, corporis, ut illo ducimus id aliquam dolorem?",
        ],
        [
            "title" => "Judul Post Anime",
            "slug" => "judul-post-kedua",
            "author" => "Sandhika Galih",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolorum labore praesentium, eum alias quia hic itaque repudiandae deleniti explicabo ullam, magnam nemo molestiae? Sapiente ut aliquid perspiciatis porro magnam minus dolorum quaerat facilis numquam officia! Porro ad est consequatur quis nesciunt natus, corporis, ut illo ducimus id aliquam dolorem?",
            ]
        ];

        public static function all(){
            return collect(self::$blog_posts);
        }
    
        public static function find($slug){
            $posts = static::all();
            return $posts->firstWhere('slug', $slug);
        }
}
