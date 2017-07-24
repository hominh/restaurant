<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Post;
use App\Post_Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    public function showPostByTagId($tagId) {
        if(is_numeric($tagId)) {
            $posts = Post::find($tagId);
        }
        else {
            $columnFind = 'tags.alias';
        }
        $posts = DB::table('posts')
                ->leftjoin('post_tags','posts.id','=','post_tags.post_id')
                ->leftjoin('tags','tags.id','=','post_tags.tag_id')
                ->select('posts.name as pname','posts.alias as palias','posts.intro','posts.content','posts.image','posts.description','posts.id as pid','tags.name as tname','tags.alias as talias')
                ->where($columnFind,'=',$tagId)
                ->get();

        //dd($posts);
        return view('fe.pages.tag',compact('posts'));
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
