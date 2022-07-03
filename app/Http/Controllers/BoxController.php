<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Box;
use App\Models\BoxRecipe;
use App\Models\Recipe;

class BoxController extends Controller
{
    /*
    *   Add new box
    *   parameters{delivery date,array(recipes Id)} 
    *   return json
    */
    public function CreateBox(Request $request)
    {
        if($request->delivery_date == '' || $request->delivery_date == null || $request->recipes == '' || $request->recipes == null)
            $result = response()->json(['message' => 'Missing parameters!'], 200);
        else{
            try {
                $delivery_date = Carbon::parse($request->delivery_date);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                $result = response()->json(['message' => 'Invalid date!'], 200);
                return redirect('/')->with('box',$result);
            }
            if($delivery_date < Carbon::today()->addDays(2))
                $result = response()->json(['message' => 'Delivery date unavailable!'], 200);
            else{
                $recipes = Recipe::find($request->recipes)->count();
                if($recipes>0){
                    /*insert record to boxes table */
                    $data_box = Box::create(['delivery_date'=>$delivery_date]);
                    if($data_box){
                        foreach($request->recipes as $recipe){
                            /*insert record to box_recipes table */
                            $data_boxrecipe = BoxRecipe::create(['box_id'=>$data_box->id, 'recipe_id'=>$recipe]); 
                        }
                        $result = response()->json(['message' => 'Recipe created successfully!', 'box'=> $data_box], 200);
                    }else
                        $result = response()->json(['message' => 'Failed to create Box!'], 200);
                }else
                    $result = response()->json(['message' => 'Invalid Recipe Id!'], 200);
            }
        }
        return redirect('/')->with('box',$result);
    }
    /*
    *   Add new box
    *   parameters{delivery date,array(recipes Id)} 
    *   return json
    */
    public function apiCreateBox(Request $request)
    {
        if($request->delivery_date == '' || $request->delivery_date == null || $request->recipes == '' || $request->recipes == null)
            $result = response()->json(['message' => 'Missing parameters!'], 200);
        else{
            try {
                $delivery_date = Carbon::parse($request->delivery_date);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                $result = response()->json(['message' => 'Invalid date!'], 200);
                return $result;
            }
            if($delivery_date < Carbon::today()->addDays(2))
                $result = response()->json(['message' => 'Delivery date unavailable!'], 200);
            else{
                $recipes = Recipe::find($request->recipes)->count();
                if($recipes>0){
                    /*insert record to boxes table */
                    $data_box = Box::create(['delivery_date'=>$delivery_date]);
                    if($data_box){
                        foreach($request->recipes as $recipe){
                            /*insert record to box_recipes table */
                            $data_boxrecipe = BoxRecipe::create(['box_id'=>$data_box->id, 'recipe_id'=>$recipe]); 
                        }
                        $result = response()->json(['message' => 'Recipe created successfully!', 'box'=> $data_box], 200);
                    }else
                        $result = response()->json(['message' => 'Failed to create Box!'], 200);
                }else
                    $result = response()->json(['message' => 'Invalid Recipe Id!'], 200);
            }
        }
        return $result;
    }
    /*
    *   get all boxes with pagination
    *   parameters{order date}
    *   return json
    */
    public function showall(Request $request){
        if($request->order_date == '' || $request->order_date == null){
            $result = response()->json(['message' => 'Missing parameters!'], 200);
            return redirect('/')->with('boxes',$result);
        }else{
            try {
                $order_date = Carbon::parse($request->order_date);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                $result = response()->json(['message' => 'Invalid date!'], 200);
                return redirect('/')->with('boxes',$result);
            }
            $endDate = Carbon::today()->addDays(7);
            $all = Box::whereBetween('delivery_date', [$order_date, $endDate])->paginate(10);
            return view('boxesTable',[
                'boxes' => $all
            ]);
        }
    }
    /*
    *   get all boxes with pagination
    *   parameters{order date}
    *   return json
    */
    public function apishowall(Request $request){
        if($request->order_date == '' || $request->order_date == null){
            $result = response()->json(['message' => 'Missing parameters!'], 200);
            return $result;
        }else{
            try {
                $order_date = Carbon::parse($request->order_date);
            } catch (\Carbon\Exceptions\InvalidFormatException $e) {
                $result = response()->json(['message' => 'Invalid date!'], 200);
                return $result;
            }
            $endDate = Carbon::today()->addDays(7);
            $all = Box::whereBetween('delivery_date', [$order_date, $endDate])->paginate(10);
            return $all;
        }
    }
}
