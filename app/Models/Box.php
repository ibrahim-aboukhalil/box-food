<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // allow all value except this
    protected $fillable = ['delivery_date']; // allow value
    protected $with = ['boxrecipes'];

    /**
     * Get the recipes for the boxes.
     */
    public function boxrecipes()
    {
        return $this->hasMany(BoxRecipe::class);
    }
}
