<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\History;

class HistoryController extends Controller
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
        $data = DB::table('histories')
            ->join('users','histories.user_id','=','users.id')
            ->select('histories.id as id', 'histories.year as year','histories.content','users.name as uname','histories.created_at')
            ->get();
        return view('admin/history/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/history/add');
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
           'year' => 'required|min:4',
           'content' => 'required'
       ]);
        $history = new History;
        $history->year = $request->year;
        $history->content = $request->content;

        if(Input::hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $request->file('image')->getClientOriginalName();
            $path = public_path("images/history/");
            $request->file('image')->move($path , $imageName);
            $history->image = $imageName;
        }
        $history->user_id = Auth::user()->id;
        $history->save();
        return redirect()->route('admin.history.list');
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
        $data = History::findOrFail($id)->toArray();
        return view('admin.history.edit',compact('data','id'));
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
           'year' => 'required|min:4',
           'content' => 'required'
       ]);

       $history = History::find($id);
       $history->year = $request->year;
       $history->content = $request->content;

       if(Input::hasFile('newimage')) {
           $imageTempName = $request->file('newimage')->getPathname();
           $imageName = $request->file('newimage')->getClientOriginalName();
           $path = public_path("images/history/");
           $request->file('newimage')->move($path , $imageName);
           $history->image = $imageName;
       }
       $history->user_id = Auth::user()->id;
       $history->save();
       return redirect()->route('admin.history.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = History::find($id);
        $history->delete();
        return redirect()->route('admin.history.list');
    }

    public function getDelImg($id,Request $request) {
        if($request->ajax()) {
            $idHistory = (int)$request->get('idHistory');
            $historyDetail = History::find($idHistory);
            if(!empty($historyDetail)) {
                $img = public_path("images/history/");
                $img.= $historyDetail->image;

                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $historyDetail->image = "";
                $historyDetail->save();

            }
            return "ok";
        }
    }
}
