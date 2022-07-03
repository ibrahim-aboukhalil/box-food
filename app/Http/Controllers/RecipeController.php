<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\RecipeIngredient;

class RecipeController extends Controller
{
    /*
    *   Add new recipe
    *   parameters{name,description,array(ingredients,amount)} 
    *   return json
    */
    public function CreateRecipe(Request $request)
    {
        if($request->recipe_name == '' || $request->recipe_name == null || $request->recipe_description == '' || $request->recipe_description == null || $request->recipe_ingredients == '' || $request->recipe_ingredients == null)
            $result = response()->json(['message' => 'Missing parameters!'], 200);
        else{
            /*insert record to recipe table */
            $data_recipe = Recipe::create(['name'=>$request->recipe_name, 'description'=>$request->recipe_description]);
            if($data_recipe){
                $json_obj = '{"ingredients":['.substr($request->recipe_ingredients,0,-1).']}';
                $ingredients = json_decode($json_obj);
                $data = "";
                foreach($ingredients->ingredients as $ingredient){
                    /*insert record to recipe_ingredients table */
                    $data_recipeIngredient = RecipeIngredient::create(['recipe_id'=>$data_recipe->id, 'ingredient_id'=>$ingredient->ingredient_id, 'amount'=>$ingredient->amount]);
                    $data.=$data_recipeIngredient;
                }
                $result = response()->json(['message' => 'Recipe created successfully!', 'recipe'=> $data_recipe, 'recipe_ingredients' => $data], 200);
            }else
                $result = response()->json(['message' => 'Failed to create Recipe!'], 200);
        }
        return redirect('/')->with('recipe',$result);
    }
    /*
    *   Add new recipe
    *   parameters{name,description,array(ingredients,amount)} 
    *   return json
    */
    public function apiCreateRecipe(Request $request)
    {
        if($request->recipe_name == '' || $request->recipe_name == null || $request->recipe_description == '' || $request->recipe_description == null || $request->recipe_ingredients == '' || $request->recipe_ingredients == null)
            $result = response()->json(['message' => 'Missing parameters!'], 200);
        else{
            /*insert record to recipe table */
            $data_recipe = Recipe::create(['name'=>$request->recipe_name, 'description'=>$request->recipe_description]);
            if($data_recipe){
                $json_obj = '{"ingredients":['.substr($request->recipe_ingredients,0,-1).']}';
                $ingredients = json_decode($json_obj);
                $data = "";
                foreach($ingredients->ingredients as $ingredient){
                    /*insert record to recipe_ingredients table */
                    $data_recipeIngredient = RecipeIngredient::create(['recipe_id'=>$data_recipe->id, 'ingredient_id'=>$ingredient->ingredient_id, 'amount'=>$ingredient->amount]);
                    $data.=$data_recipeIngredient;
                }
                $result = response()->json(['message' => 'Recipe created successfully!', 'recipe'=> $data_recipe, 'recipe_ingredients' => $data], 200);
            }else
                $result = response()->json(['message' => 'Failed to create Recipe!'], 200);
        }
        return $result;
    }
    /*
    *   get all recipes with pagination
    *   parameters{}
    *   return json
    */
    public function showall(){
        $all = Recipe::paginate(10);
        return view('recipesTable',[
            'recipes' => $all
        ]);
    }
    /*
    *   get all recipes with pagination
    *   parameters{}
    *   return json
    */
    public function apishowall(){
        $all = Recipe::paginate(10);
        return $all;
    }
}
