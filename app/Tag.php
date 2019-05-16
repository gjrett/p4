<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Many-to-Many Tags and Wines
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wines()
    {
        return $this->belongsToMany('App\Wine')->withTimestamps();
    }

    /**
     * Helper method to get all tags authors for displaying in a list of checkboxes
     * @return mixed
     */
    public static function getForCheckboxes()
    {
        return self::orderBy('name')->select(['name', 'id'])->get();
    }
}