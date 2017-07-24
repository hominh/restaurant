<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Foodtype;
use App\Http\Requests;
use Response;

class FoodController extends Controller
{

    public function index() {
        $foodtypes  = $this->getAllFoodType();
        $foods = DB::table('foods')
                ->leftjoin('foodtypes','foods.foodtype_id','=','foodtypes.id')
                ->select('foods.name','foods.alias','foods.price','foods.intro','foods.content','foods.image','foods.keyword','foods.description','foods.foodtype_id')
                ->where('foodtypes.name','=','Breakfast')
                ->get();

        return view('fe.pages.menu',compact('foodtypes','foods'));
    }

    public function getFoodByFoodTypeId($foodtypeId,Request $request) {
        if($request->ajax()) {
            $foodtypes  = $this->getAllFoodType();
            $foodsjson = DB::table('foods')
                    ->leftjoin('foodtypes','foods.foodtype_id','=','foodtypes.id')
                    ->select('foods.name','foods.alias','foods.price','foods.intro','foods.content','foods.image','foods.keyword','foods.description','foods.foodtype_id','foodtypes.name as fttname')
                    ->where('foodtypes.id','=',$foodtypeId)
                    ->get();
            $foodsjson = json_encode($foodsjson);
            return view('fe.pages.menu',compact('foodtypes','foodsjson'));
        }
    }

    public function getAllFoodType() {
        $foodtypes  = Foodtype::all();
        return $foodtypes;
    }
}
