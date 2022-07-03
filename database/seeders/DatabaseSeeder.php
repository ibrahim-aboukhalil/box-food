<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Box;
use App\Models\BoxRecipe;
use App\Models\RecipeIngredient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        Ingredient::factory(15)->create();
        Recipe::factory(7)->create();
        Box::factory(2)->create();
        RecipeIngredient::factory()->create([
            'recipe_id' => 1,
            'ingredient_id' => 1,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 1,
            'ingredient_id' => 2,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 1,
            'ingredient_id' => 3,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 2,
            'ingredient_id' => 4,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 2,
            'ingredient_id' => 5,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 2,
            'ingredient_id' => 6,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 3,
            'ingredient_id' => 2,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 3,
            'ingredient_id' => 8,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 4,
            'ingredient_id' => 10,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 4,
            'ingredient_id' => 11,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 5,
            'ingredient_id' => 7,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 6,
            'ingredient_id' => 9,
        ]);
        RecipeIngredient::factory()->create([
            'recipe_id' => 7,
            'ingredient_id' => 13,
        ]);
        BoxRecipe::factory()->create([
            'box_id' => 1,
            'recipe_id' => 1,
        ]);
        BoxRecipe::factory()->create([
            'box_id' => 1,
            'recipe_id' => 2,
        ]);
        BoxRecipe::factory()->create([
            'box_id' => 1,
            'recipe_id' => 3,
        ]);
        BoxRecipe::factory()->create([
            'box_id' => 1,
            'recipe_id' => 4,
        ]);
        BoxRecipe::factory()->create([
            'box_id' => 2,
            'recipe_id' => 5,
        ]);
        BoxRecipe::factory()->create([
            'box_id' => 2,
            'recipe_id' => 7,
        ]);
    }
}
