<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    protected $table = "sales";

    protected $fillable = ['name', 'surname', 'address1', 'address2', 'city', 'country', 'phone', 'email', 'sales', 'card', 'expires', 'cvc'];
}