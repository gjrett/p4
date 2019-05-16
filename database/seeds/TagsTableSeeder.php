<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Red', 'White', 'Rose', 'Fruity', 'Velvety', 'Raspberry', 'Delicate', 'Crisp', 'Lucious'. 'Light', 'Juicy'];

        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}