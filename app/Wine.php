<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Wine extends Model
{
    /**
     * One to Many Wines and Vineyards
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vineyard()
    {
        # Wine belongs to Vineyard
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Vineyard');
    }

      /**
     * Many to Many Wines and Tags
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /*
    * Dump the essential details of wines to the page
    * Used when practicing queries and you want to quickly see the wines in the database
    * Can accept a Collection of wines, or if none is provided, will default to all wines
    */
    public static function dump($wines = null)
    {
        # Empty array that will hold all our book data
        $data = [];

        # Determine if we should use $books as was passed to this method
        # or query for all books
        if (is_null($wines)) {
            # Query for all the wines
            $wines = self::all();
        }

        # Load the data array with the wine info we want
        foreach ($wines as $wine) {
            $data[] = $wine->name . ' ' . $wine->type . ' ' . $wine->grape . ' ' . $wine->vineyard . ' ' . $wine->year . ' ' . $wine->rating . ' ' . $wine->cost . ' ' . $wine->comment;
        }

        dump($data);
    }
}