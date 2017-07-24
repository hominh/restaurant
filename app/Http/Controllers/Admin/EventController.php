<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use File;
use DB;
use App\Http\Controllers\Controller;
use App\Event;
use App\Imageevent;
use App\Tag;
use App\Event_Tag;
use Auth;

class EventController extends Controller
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
        $data = DB::table('events')
                ->leftJoin('imageevent','events.id','=','imageevent.event_id')
                ->leftJoin('users','events.user_id','=','users.id')
                ->select('events.id','events.name as name','events.website','users.name as uname','events.created_at')
                ->distinct()
                ->get();
        return view('admin/event/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/event/add');
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
       ]);

       $event = new Event;
       $event->name = $request->name;
       $event->alias = changeTitle($request->name);
       $event->intro = $request->intro;
       $event->datetime = $request->output;
       $event->user_id = Auth::user()->id;
       $event->website = $request->website;
       $event->content = $request->content;
       if(Input::hasFile('avatar')) {
           $avatarTempName = $request->file('avatar')->getPathname();
           $avatarName = $request->file('avatar')->getClientOriginalName();
           $pathAvatar = public_path("images/event/");
           $request->file('avatar')->move($pathAvatar , $avatarName);
           $event->avatar = $avatarName;
       }
       $event->save();
       $event_id = $event->id;

       $tag = $request->tag;
       if($tag != "" || $tag != NULL) {
           $tags = explode(",", $tag);
           foreach ($tags as $t) {
               $checkExistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
               if(count($checkExistTag) <= 0) { //If don't have tag
                   $tagObj = new Tag;
                   $tagObj->name = $t;
                   $tagObj->alias = changeTitle($t);
                   $tagObj->save();
                   $idTag = $tagObj->id;
               }
               else { //If have tag
                   $checkexistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                   $idTag = $checkexistTag[0]->id;
               }
               $event_tagObj = new Event_Tag;
               $event_tagObj->event_id = $event_id;
               $event_tagObj->tag_id = $idTag;
               $event_tagObj->save();
           }
       }

       //if($request->file('file') != NULL || $request->file('file') != "") {
       if($files=$request->file('image')) {
           foreach($files as $file) {
               $image_event = new Imageevent;
               if(isset($file)) {
                   $imageName = $file->getClientOriginalName();
                   $path = public_path("images/event/");
                   $file->move($path , $imageName);

                   $image_event->image = $imageName;
                   $image_event->event_id = $event_id;
                   $image_event->user_id = Auth::user()->id;
                   $image_event->save();
               }

           }
       }
       return redirect()->route('admin.event.list')->with('message','Success');


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
        $data = Event::findOrFail($id)->toArray();
        $tags = DB::table('tags')
                ->join('event_tags','tags.id','=','event_tags.tag_id')
                ->select('tags.name')
                ->where('event_tags.event_id','=',$id)
                ->get();
        $strTag = "";
        foreach($tags as $tag) {
            $strTag.= $tag->name.",";

        }
        $strTag = substr($strTag,0,-1);

        return view('admin.event.edit',compact('data','id','strTag'));
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
        ]);
        DB::table('event_tags')->where('event_id', '=', $id)->delete();
        $tag = $request->tag;
        if($tag != "" || $tag != NULL) {
            $tags = explode(",", $tag);
            foreach ($tags as $t) {
                $checkExistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                if(count($checkExistTag) <= 0) { //If don't have tag
                    $tagObj = new Tag;
                    $tagObj->name = $t;
                    $tagObj->alias = changeTitle($t);
                    $tagObj->save();
                    $idTag = $tagObj->id;
                }
                else { //If have tag
                    $checkexistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                    $idTag = $checkexistTag[0]->id;
                }
                $event_tagObj = new Event_Tag;
                $event_tagObj->event_id = $id;
                $event_tagObj->tag_id = $idTag;
                $event_tagObj->save();
            }
        }

        $event = Event::find($id);
        $event->name = $request->name;
        $event->alias = changeTitle($request->name);
        $event->intro = $request->intro;
        $event->datetime = $request->output;
        $event->user_id = Auth::user()->id;
        $event->website = $request->website;
        $event->content = $request->content;
        if($request->newimage != "" || $request->newimage != NULL) {
            if(Input::hasFile('newimage')) {
                $imageTempName = $request->file('newimage')->getPathname();
                $imageName = $request->file('newimage')->getClientOriginalName();
                $path = public_path("images/event/");
                $request->file('newimage')->move($path , $imageName);
                $event->avatar = $imageName;
            }
        }

        $event->save();
        return redirect()->route('admin.event.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.event.list');
    }

    public function getDelImg($id,Request $request) {
        if($request->ajax()) {
            $idEvent = (int)$request->get('idEvent');
            $eventDetail = Event::find($idEvent);
            if(!empty($eventDetail)) {
                $img = public_path("images/event/");
                $img.= $eventDetail->avatar;

                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $eventDetail->avatar = "";
                $eventDetail->save();

            }
            return "ok";
        }
    }
}
