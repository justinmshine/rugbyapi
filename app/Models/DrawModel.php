<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawModel extends Model
{
    protected $table = "draw";

    protected $fillable = ['name', 'surname', 'address1', 'city', 'country', 'phone', 'email', 'result'];
}