<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use DB;
use App\Comment;
use App\Post_Comment;
use App\Event_Comment;
use App\Post;

class CommentController extends Controller
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
        $inputArray = $request->all();
        $comment = new Comment;
        $comment->name = $inputArray['name'];
        $comment->email = $inputArray['email'];
        $comment->content = $inputArray['content'];
        $comment->save();
        $comment_id = $comment->id;
        $post_id = $inputArray['hidden'];

        if(isset($comment_id) && isset($post_id)) {
            $post_comment = new Post_Comment;
            $post_comment->post_id = $post_id;
            $post_comment->comment_id = $comment_id;
            $post_comment->save();
        }

    }

    public function storeCommentEvent(Request $request) {
        $inputArray = $request->all();
        $comment = new Comment;
        $comment->name = $inputArray['name'];
        $comment->email = $inputArray['email'];
        $comment->content = $inputArray['content'];
        $comment->save();
        $comment_id = $comment->id;
        $event_id = $inputArray['hidden'];

        if(isset($comment_id) && isset($event_id)) {
            $event_comment = new Event_Comment;
            $event_comment->event_id = $event_id;
            $event_comment->comment_id = $comment_id;
            $event_comment->save();
        }
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
