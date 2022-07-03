<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ingredient;
use App\Models\Recipe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',[
        'ingredients' => Ingredient::all(),
        'recipes' => Recipe::all()
    ]);
})->name('home');

/*Ingredients APIs*/
Route::post('ingredient/create','App\Http\Controllers\IngredientController@CreateIngredient')->name('ingredientcreate');
Route::post('api/ingredient/create','App\Http\Controllers\IngredientController@apiCreateIngredient')->name('APIingredientcreate');
Route::get('ingredient/all', 'App\Http\Controllers\IngredientController@showallpagination')->name('allIngredients');
Route::get('api/ingredient/all', 'App\Http\Controllers\IngredientController@apishowallpagination')->name('APIallIngredients');

/* Recipes APIs*/
Route::post('recipe/create','App\Http\Controllers\RecipeController@CreateRecipe')->name('recipecreate');
Route::post('api/recipe/create','App\Http\Controllers\RecipeController@apiCreateRecipe')->name('APIrecipecreate');
Route::get('recipe/all', [App\Http\Controllers\RecipeController::class, 'showall'])->name('allRecipes');
Route::get('api/recipe/all', [App\Http\Controllers\RecipeController::class, 'apishowall'])->name('APIallRecipes');

/* Boxes APIs*/
Route::post('box/create','App\Http\Controllers\BoxController@CreateBox')->name('boxcreate');
Route::post('api/box/create','App\Http\Controllers\BoxController@apiCreateBox')->name('APIboxcreate');
Route::get('box/all', [App\Http\Controllers\BoxController::class, 'showall'])->name('allBoxes');
Route::get('api/box/all', [App\Http\Controllers\BoxController::class, 'apishowall'])->name('APIallBoxes');