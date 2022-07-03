<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $guarded = ['id']; // allow all value except this
    protected $fillable = ['name', 'measure', 'supplier']; // allow value
    
}
