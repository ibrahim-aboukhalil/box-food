<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // allow all value except this
    protected $fillable = ['recipe_id', 'ingredient_id', 'amount']; // allow value
    protected $with = ['ingredients'];

    /**
     * Get the ingredients for the recipe.
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class,'id', 'ingredient_id');
    }

}
