<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /*
    *   Add new ingredient
    *   parameters{name,measure,supplier} 
    *   return json
    */
    public function CreateIngredient(Request $request)
    {
        if($request->ingredient_name == '' || $request->ingredient_name == null || $request->measure == '' || $request->measure == null || $request->supplier == '' || $request->supplier == null)
            $result = response()->json(['message' => 'Missing parameters!'], 200);
        elseif($request->measure != 'g' && $request->measure != 'kg' && $request->measure != 'pieces' )
            $result = response()->json(['message' => 'Invalid measure!'], 200);
        else{
            $data = Ingredient::create(['name'=>$request->ingredient_name, 'measure'=>$request->measure, 'supplier'=>$request->supplier]);
            if($data)
                $result = response()->json(['message' => 'Ingredient created successfully!', 'data'=> $data], 200);
            else
                $result = response()->json(['message' => 'Failed to create Ingredient!'], 200);
        }
        return redirect('/')->with('ingredient',$result);
    }
    /*
    *   Add new ingredient
    *   parameters{name,measure,supplier} 
    *   return json
    */
    public function apiCreateIngredient(Request $request)
    {
        if($request->ingredient_name == '' || $request->ingredient_name == null || $request->measure == '' || $request->measure == null || $request->supplier == '' || $request->supplier == null)
            $result = response()->json(['message' => 'Missing parameters!'], 200);
        elseif($request->measure != 'g' && $request->measure != 'kg' && $request->measure != 'pieces' )
            $result = response()->json(['message' => 'Invalid measure!'], 200);
        else{
            $data = Ingredient::create(['name'=>$request->ingredient_name, 'measure'=>$request->measure, 'supplier'=>$request->supplier]);
            if($data)
                $result = response()->json(['message' => 'Ingredient created successfully!', 'data'=> $data], 200);
            else
                $result = response()->json(['message' => 'Failed to create Ingredient!'], 200);
        }
        return $result;
    }
    /*
    *   get all ingredients with pagination
    *   parameters{}
    *   return json
    */
    public function showallpagination(){
        $all = Ingredient::paginate(10);
        return view('ingredientsTable',[
            'ingredients' => $all
        ]);
    }
    /*
    *   get all ingredients with pagination
    *   parameters{}
    *   return json
    */
    public function apishowallpagination(){
        $all = Ingredient::paginate(10);
        return $all;
    }
    /*
    *   get all ingredients
    *   parameters{}
    *   return json
    */
    public function showall(){
        $all = Ingredient::all();
        return  $all;
    }
}
