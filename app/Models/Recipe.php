<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // allow all value except this
    protected $fillable = ['name', 'description']; // allow value
    protected $with = ['recipeIngredients'];

    /**
     * Get the ingredients for the recipe.
     */
    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }
}
