<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShirtsModel extends Model
{
    protected $table = "shirts";

    /**
     * Get the country associated with the shirt.
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class);
    }

    /**
     * Get the reviews associated with the shirt.
     */
    public function reviews(): HasOne
    {
        return $this->hasMany(Reviews::class);
    }
}
