<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //fillable fields
    protected $primaryKey = 'food_id';
    protected $fillable = ['food_id', 'food_name', 'food_description', 'food_highlight', 'food_ingredient', 'food_delivery', 'food_price', 'cat_id'];
    
    //custom timestamps name
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
