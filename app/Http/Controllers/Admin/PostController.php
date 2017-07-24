<?php

namespace App\Http\Controllers\admin;

use File;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Tag;
use App\Post_Tag;
use DB;
use App\Posttype;
use Auth;


class PostController extends Controller
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
        $data = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->select('posts.id as id', 'posts.name as fname','posts.keyword','users.name as uname','posts.created_at')
            ->get();
        return view('admin/post/list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posttype = Posttype::all();
        return view('admin/post/add',compact('posttype'));
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
           'name' => 'required|unique:posts|min:5',
           'content' => 'required|min:5',
           'posttype' => 'required'
       ]);
        $post = new Post;
        $post->name = $request->name;
        $post->alias = changeTitle($request->name);
        $post->keyword = $request->keyword;
        $post->description = $request->description;
        $post->intro = $request->intro;
        $post->content = $request->content;
        $post->posttype_id = $request->posttype;
        $post->user_id = Auth::user()->id;

        //image
        if(Input::hasFile('image')) {
            $imageTempName = $request->file('image')->getPathname();
            $imageName = $request->file('image')->getClientOriginalName();
            $path = public_path("images/post/");
            $request->file('image')->move($path , $imageName);
            $post->image = $imageName;
        }

        $post->save();
        $post_id = $post->id;

        //Tag
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
                $post_tagObj = new Post_Tag;
                $post_tagObj->post_id = $post_id;
                $post_tagObj->tag_id = $idTag;
                $post_tagObj->save();
            }
        }
        return redirect()->route('admin.post.list');
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
        $data = Post::findOrFail($id)->toArray();
        $tags = DB::table('tags')
                ->join('post_tags','tags.id','=','post_tags.tag_id')
                ->select('tags.name')
                ->where('post_tags.post_id','=',$id)
                ->get();
        $strTag = "";
        foreach($tags as $tag) {
            $strTag.= $tag->name.",";

        }
        $strTag = substr($strTag,0,-1);
        $currentPosttypeobj = DB::table('posttypes')
                            ->join('posts','posttypes.id','=','posttype_id')
                            ->select('posttypes.id as idpt','posttypes.name as namept')
                            ->where('posts.id','=',$id)
                            ->get();
        $idpt = $currentPosttypeobj[0]->idpt;

        $otherPosttypeobj = DB::table('posttypes')
                            ->select('posttypes.id as idpt','posttypes.name as namept')
                            ->where('posttypes.id','<>',$idpt)
                            ->get();


        return view('admin.post.edit',compact('data','id','strTag','currentPosttypeobj','otherPosttypeobj'));
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
        DB::table('post_tags')->where('post_id', '=', $id)->delete();
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
                $post_tagObj = new Post_Tag;
                $post_tagObj->post_id = $id;
                $post_tagObj->tag_id = $idTag;
                $post_tagObj->save();
            }
        }
        $post = Post::find($id);

        $post->name = $request->name;
        $post->alias = changeTitle($request->name);
        $post->keyword = $request->keyword;
        $post->description = $request->description;
        $post->intro = $request->intro;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;

        //Image
        if($request->newimage != "" || $request->newimage != NULL) {
            if(Input::hasFile('newimage')) {
                $imageTempName = $request->file('newimage')->getPathname();
                $imageName = $request->file('newimage')->getClientOriginalName();
                $path = public_path("images/post/");
                $request->file('newimage')->move($path , $imageName);
                $post->image = $imageName;
            }
        }

        $post->save();
        return redirect()->route('admin.post.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.post.list');
    }

    public function getDelImg($id,Request $request) {
        if($request->ajax()) {
            $idPost = (int)$request->get('idPost');
            $postDetail = Post::find($idPost);
            if(!empty($postDetail)) {
                $img = public_path("images/post/");
                $img.= $postDetail->image;

                if(File::exists($img)) {
                    File::delete($img);
                }
                //Update image = Null
                $postDetail->image = "";
                $postDetail->save();

            }
            return "ok";
        }
    }

}
