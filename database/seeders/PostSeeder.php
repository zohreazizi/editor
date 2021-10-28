<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'fresh command',
                'content' => 'You may also seed your database using the migrate:fresh command',
                'user_id' => 10,
            ],
            [
                'title' => 'Become a Laravel Partner',
                'content' => 'Laravel Partners are elite shops providing top-notch Laravel development and consulting',
                'user_id' => 10,
            ],
            [
                'title' => 'lose data',
                'content' => 'Some seeding operations may cause you to alter or lose data.',
                'user_id' => 7,
            ],

        ];

        foreach ($posts as $post){
            Post::query()->create($post);
        }

    }
}
