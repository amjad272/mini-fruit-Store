<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FruitList extends Model
{
    protected $fillable = [
        'fruit_name',
        'quantity',
    ];
}
