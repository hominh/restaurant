<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Milestone;
use App\User;
use DB;
use Auth;

class MileStoneController extends Controller
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
        $data = DB::table('milestones')
            ->join('users','milestones.user_id','=','users.id')
            ->select('milestones.id as id', 'milestones.name as fname','users.name as uname','milestones.created_at')
            ->get();
        //dd($data);
        return view('admin/milestone/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/milestone/add');
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
           'name' => 'required|min:5',
           'content' => 'required|min:5',
       ]);
        $milestone = new Milestone;
        $milestone->name = $request->name;
        $milestone->author = $request->author;
        $milestone->content = $request->content;
        $milestone->user_id = Auth::user()->id;
        //dd($request);
        //dd($foodtype);
        $milestone->save();
        return redirect()->route('admin.foodtype.list')->with('message','Success');
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
        $data = Milestone::findOrFail($id)->toArray();
        return view('admin.milestone.edit',compact('data','id'));
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
           'name' => 'required|min:5',
           'content' => 'required|min:5',
       ]);
        $milestone = Milestone::find($id);
        $milestone->name = $request->name;
        $milestone->author = $request->author;
        $milestone->content = $request->content;
        $milestone->user_id = Auth::user()->id;
        $milestone->save();
        return redirect()->route('admin.milestone.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $milestone = Milestone::find($id);
        $milestone->delete();
        return redirect()->route('admin.milestone.list');
    }
}
