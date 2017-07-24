<?php

namespace App\Http\Controllers\admin;

use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('auth');
    }


    public function index()
    {
        $data = DB::table('services')
            ->join('users','services.user_id','=','users.id')
            ->select('services.id as id', 'services.name as fname','services.keyword','users.name as uname','services.created_at')
            ->get();
        return view('admin/service/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/service/add');
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
           'name' => 'required|unique:services|min:5',
           'content' => 'required|min:5'
        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->alias = changeTitle($request->name);
        $service->keyword = $request->keyword;
        $service->description = $request->description;
        $service->intro = $request->intro;
        $service->content = $request->content;
        $service->user_id = Auth::user()->id;

        if(Input::hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $request->file('image')->getClientOriginalName();
            $path = public_path("images/service/");
            $request->file('image')->move($path , $imageName);
            $service->image = $imageName;
        }

        $service->save();

        return redirect()->route('admin.service.list');
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
        $data = Service::findOrFail($id)->toArray();
        return view('admin.service.edit',compact('data'));
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
           'content' => 'required|min:5'
        ]);

        $service = Service::find($id);

        $service->name = $request->name;
        $service->alias = changeTitle($request->name);
        $service->keyword = $request->keyword;
        $service->description = $request->description;
        $service->intro = $request->intro;
        $service->content = $request->content;
        $service->user_id = Auth::user()->id;

        if($request->newimage != "" || $request->newimage != NULL) {
            if(Input::hasFile('newimage')) {
                $imageTempName = $request->file('newimage')->getPathname();
                $imageName = $request->file('newimage')->getClientOriginalName();
                $path = public_path("images/service/");
                $request->file('newimage')->move($path , $imageName);
                $service->image = $imageName;
            }
        }
        $service->save();
        return redirect()->route('admin.service.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }

    public function getDelImg($id,Request $request) {
        if($request->ajax()) {
            $idService = (int)$request->get('idService');
            $serviceDetail = Service::find($idService);


            if(!empty($serviceDetail)) {
                $img = public_path("images/service/");
                $img.= $serviceDetail->image;

                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $serviceDetail->image = "";
                $serviceDetail->save();
            }
            return "ok";
        }
    }
}
