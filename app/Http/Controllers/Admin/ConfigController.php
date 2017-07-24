<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Auth;
use DB;
use App\Config;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('configs')
            ->join('users','configs.user_id','=','users.id')
            ->select('configs.id as id', 'configs.name as fname','configs.value','users.name as uname','configs.created_at')
            ->get();
        return view('admin/config/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/config/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
        ]);
       $config = new Config;
       $config->name = $request->name;

       $config->user_id = Auth::user()->id;

       if(Input::hasFile('image')) {
           $imageTempName = $request->file('image')->getPathname();
           $imageName = $request->file('image')->getClientOriginalName();
           $path = public_path("images/logo/");
           $request->file('image')->move($path , $imageName);
           $config->value = $imageName;
       }
       else {
           $config->value = $request->value;
       }
       $config->save();
       return redirect()->route('admin.config.list')->with('message','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Config::findOrFail($id)->toArray();
        return view('admin.config.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required',
        ]);

        $config = Config::find($id);
        $config->name = $request->name;
        $config->value = $request->value;
        $config->user_id = Auth::user()->id;
        $config->save();
        return redirect()->route('admin.config.list')->with('message','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $config = Config::find($id);
        $config->delete();
        return redirect()->route('admin.config.list');
    }
}
