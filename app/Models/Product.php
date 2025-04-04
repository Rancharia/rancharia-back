<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = ['name', 'category', 'code', 'price_cost', 'price_sale', 'measure', 'stock', 'description', 'image'];
}
