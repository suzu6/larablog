<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->title = "タイトル";
        $post->html = "<p>本文</p>";
        $post->is_draft = false;
        $post->save();
        $post->tags()->attach([1,2]);
    }
}
