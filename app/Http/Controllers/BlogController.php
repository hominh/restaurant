<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$recentposts = DB::table('posts');
        $allpost = Post::all();
        $a = "";
        foreach($allpost as $item) {
            $a.= $item->id.",";
            $idpost = $item->id;
            echo $idpost."<br />";
            $tmp = $this->getTagByPostId($idpost);
            $tag = DB::table('tags')
            //dd($tmp);
                    ->join('post_tags','tags.id','=','post_tags.tag_id')
                    ->select('tags.name','tags.id','post_tags.post_id')
                    ->get();

            for($i = 0; $i < count($tag); $i++) {
                $j = $i + 1;
                if($j < count($tag)) {
                    if($tag[$i]->post_id == $tag[$j]->post_id) {
                          //Lam gi o day nhi
                          //post_id: 2 | name: Recipe;Chicken;Fish
                          //post_id: 3 | name: Recipe;Chicken;Fish
                    }
                }

            }
        }*/


        $allpost = DB::table('posts')
                    ->select('posts.id','posts.name as pname','posts.alias','posts.intro','posts.content','posts.image','posts.keyword','posts.description')
                    ->paginate(5);

        $arrId = "";
        foreach($allpost as $item) {
            $arrId.= $item->id;
            $arrId.= ",";
        }
        $arrId = substr_replace($arrId,"",-1);
        $allTags = $this->getTagByPostId($arrId);
        $strTmp = "";
        for($i = 0; $i < count($allTags); $i++) {
            $j = $i + 1;
            if($j < count($allTags)) {
                if($allTags[$i]->post_id == $allTags[$j]->post_id) {
                    $strTmp.= $allTags[$i]->name;
                    $strTmp.= ",";

                }
                else {
                    $strTmp.= "|";
                }
            }

        }



        $tags = DB::table('tags')
                    ->select('tags.id','tags.name')
                    ->orderBy('id','DESC')
                    ->get();


        //dd($lastestcomments);
        return view('fe.pages.blog',compact('recentposts','tags','lastestcomments','allpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getTagByPostId($idPost) {
        $tag = DB::select(DB::raw("select `tags`.`name`, `tags`.`id`, `post_tags`.`post_id` from `tags` left join `post_tags` on `tags`.`id` = `post_tags`.`tag_id` where `post_tags`.`post_id` in (".$idPost.")"));
        return $tag;
     }

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
