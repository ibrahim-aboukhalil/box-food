<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxRecipe extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // allow all value except this
    protected $fillable = ['box_id','recipe_id']; // allow value
    protected $with = ['recipes'];

    /**
     * Get the recipes for the box.
     */
    public function recipes()
    {
        return $this->hasMany(Recipe::class,'id', 'recipe_id');
    }
}
