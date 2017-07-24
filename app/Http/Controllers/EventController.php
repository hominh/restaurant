<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEvent = DB::table('events')
                ->leftJoin('imageevent','events.id','=','imageevent.event_id')
                ->leftJoin('users','events.user_id','=','users.id')
                ->select('events.id','events.alias','events.name as name','events.website','users.name as uname','events.created_at','events.intro','events.avatar','events.datetime')
                ->distinct()
                ->get();
        return view('fe.pages.event',compact('allEvent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(is_numeric($id)) {
            $event = Event::find($id);
        }
        else {
            $columnFind = 'alias';
            $event = DB::table('events')
                    ->leftjoin('users','events.user_id','=','users.id')
                    ->select('events.id','events.name','events.alias','events.intro','events.content','events.datetime','events.avatar','events.website','users.id as uid','users.about as about','users.name as uname','users.image as uimage')
                    ->where($columnFind,'=',$id)
                    ->get();
        }
        $idEvent = $event[0]->id;
        $comments = DB::table('comments')
                    ->join('event_comments','comments.id','=','event_comments.comment_id')
                    ->select('comments.id','comments.name','comments.email','comments.content')
                    ->where('event_comments.event_id','=',$idEvent)
                    ->get();


        //dd($event);
        //dd($comments);
        return view('fe.pages.event_detail',compact('event','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
