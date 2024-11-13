<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShirtsModel extends Model
{
    protected $table = "shirts";

    /**
     * Get the country associated with the shirt.
     */
    public function country(): HasOne
    {
        return $this->hasOne(CountryModel::class, 'shirt_id');
    }

    /**
     * Get the image associated with the shirt.
     */
    public function image(): HasOne
    {
        return $this->hasOne(ImagesModel::class, 'shirt_id');
    }

    /**
     * Get the stock dimensions with the shirt.
     */
    public function stock(): HasMany
    {
        return $this->hasMany(StockModel::class, 'shirt_id');
    }

    /**
     * Get the reviews associated with the shirt.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ReviewsModel::class, 'shirt_id');
    }
}
