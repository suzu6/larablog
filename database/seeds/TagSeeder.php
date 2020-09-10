<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['映画','小説','マンガ'];
        foreach ($tags as $name) {
            $tag = new Tag;
            $tag->name = $name;
            $tag->save();
        }
    }
}
