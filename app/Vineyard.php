<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vineyard extends Model
{
    /**
     * One to Many Vineyard and Wines
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wines()
    {
        # Vineyard has many Wines
        # Define a one-to-many relationship.
        return $this->hasMany('App\wine');
    }

    /**
     * Helper method to get all the vineyards for displaying in a dropdown
     * @return mixed
     */
    public static function getForDropdown()
    {
        return self::orderBy('name')->select(['name', 'id'])->get();
    }
}