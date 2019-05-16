<?php

use Illuminate\Database\Seeder;
use App\Wine;
use App\Tag;

class TagWineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books
        $wines = [
            'Red Blend Portugal' => ['Red', 'Fruity'],
            'Alamos Mendoza' => ['Red'],
            'Altovinum Evodia' => ['Red', 'Juicy'],
            'Founder Estate Cabernet' => ['Red', 'Velvety'],
            'Bogle Old Vine Zinfadel' => ['Red', 'Light'],
            'Estate Marborough Savingnon Blanc' => ['White', 'Light'],
            'Lapostolle' => ['White', 'Crisp'],
            'Commanderie de la Bargemone' => ['Rose', 'Delicate']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($wines as $name => $tags) {

            # First get the wine
            $wine = Wine::where('name', 'like', $name)->first();

            # Now loop through each tag for this wine, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this wine
                $wine->tags()->save($tag);
            }
        }
    }
}
