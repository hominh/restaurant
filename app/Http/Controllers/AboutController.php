<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_about = DB::table('posts')
                    ->leftJoin('posttypes','posts.posttype_id','=','posttypes.id')
                    ->select('posts.name','posts.alias','posts.intro','posts.content','posts.image')
                    ->where('posttypes.name','=','About')
                    ->get();
        $milestones = DB::table('milestones')
                    ->select('milestones.name','milestones.content','milestones.author')
                    ->get();
        $employees = DB::table('employees')
                    ->leftJoin('positions','employees.position_id','=','positions.id')
                    ->select('employees.firstname','employees.lastname','positions.name','employees.note','employees.photo','employees.facebook_url','employees.twitter_url','employees.tumblr_url')
                    ->get();
        $histories = DB::table('histories')
                    ->select('histories.id','histories.year','histories.content','histories.image')
                    ->get();
        return view('fe.pages.about',compact('post_about','milestones','employees','histories'));
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
