<?php

namespace App\Http\Controllers\Admin;

use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;
use App\Slide;
use DB;
use Auth;

class SlideController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('slides')
            ->join('users','slides.user_id','=','users.id')
            ->select('slides.id as id', 'slides.title as title','slides.description','slides.image','users.name as uname','slides.created_at')
            ->get();
        return view('admin/slide/list',compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slide/add');
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
           'title' => 'required|min:5',
           'image' => 'required|min:5'
        ]);

        $slide = new Slide;
        $slide->title = $request->title;
        $slide->description = $request->description;
        $slide->textlink = $request->textlink;
        $slide->link = $request->link;
        $slide->user_id = Auth::user()->id;
        //image
        if(Input::hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $request->file('image')->getClientOriginalName();
            $path = public_path("images/slide/");
            $request->file('image')->move($path , $imageName);
            $slide->image = $imageName;
        }

        $slide->save();
        return redirect()->route('admin.slide.list');
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
        $data = Slide::findOrFail($id)->toArray();
        return view('admin.slide.edit',compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function getDelImg() {
        if($request->ajax()) {
            $idSlide = (int)$request->get('idSlide');
            $slideDetail = Slide::find($idSlide);
            if(!empty($slideDetail)) {
                $img = public_path("images/slide/");
                $img.= $slideDetail->image;

                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $slideDetail->image = "";
                $slideDetail->save();

            }
            return "ok";
        }
    }
}
