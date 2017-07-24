<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Foodtype;
use App\User;
use App\Http\Requests\FoodtypeRequest;
use DB;
use Auth;

class FoodTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = DB::table('foodtypes')
            ->join('users','foodtypes.user_id','=','users.id')
            ->select('foodtypes.id as id', 'foodtypes.name as fname','foodtypes.keyword','users.name as uname','foodtypes.created_at')
            ->get();
        return view('admin/foodtype/list',compact('data'));
    }

    public function create() {
        $foodtype = Foodtype::select('name','id','parent_id')->get()->toArray();
        return view('admin/foodtype/add',compact('foodtype'));
    }

    public function store(FoodtypeRequest $request) {
        $foodtype = new Foodtype;
        $foodtype->name = $request->name;
        $foodtype->alias = changeTitle($request->name);
        $foodtype->keyword = $request->keyword;
        $foodtype->description = $request->description;
        $foodtype->order = $request->order;
        $foodtype->parent_id = $request->foodtype;
        $foodtype->user_id = Auth::user()->id;
        $foodtype->save();
        return redirect()->route('admin.foodtype.list')->with('message','Success');
    }

    public function delete($id) {
        $parentCount = Foodtype::where('parent_id',$id)->count();
        if($parentCount == 0) {
            $foodtype = Foodtype::find($id);
            $foodtype->delete();
            return redirect()->route('admin.foodtype.list');
        }
        else {
            echo "<script type='text/javascript'>
            alert('You can't delete foodtype);
            window.location = '";
            echo route('admin.foodtype.list');
            echo "'
            </script>";
        }
    }

    public function edit($id) {
        $data = Foodtype::findOrFail($id)->toArray();
        return view('admin.foodtype.edit',compact('data','id'));
    }
    public function update(FoodtypeRequest $request,$id) {
        $foodtype = Foodtype::find($id);
        $foodtype->name = $request->name;
        $foodtype->alias = $request->name;
        $foodtype->keyword = $request->keyword;
        $foodtype->description = $request->description;
        $foodtype->order = $request->order;
        $foodtype->parent_id = $request->parent;
        $foodtype->save();
        return redirect()->route('admin.foodtype.list');
    }
}
