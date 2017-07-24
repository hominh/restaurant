<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Service;
use App\Post;
use App\Posttype;
use App\Slide;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $slides = Slide::all();
        $postmenuathome = DB::table('posts')
                            ->join('posttypes','posts.posttype_id','=','posttypes.id')
                            ->select('posts.id','posts.name','posts.alias','posts.intro','posts.content','posts.image','posts.keyword')
                            ->where('posttypes.name','LIKE','%Menu at homepage%')
                            ->get();

        $postfeatureathomeTop = DB::table('posts')
                            ->join('posttypes','posts.posttype_id','=','posttypes.id')
                            ->select('posts.id','posts.name','posts.alias','posts.intro','posts.content','posts.image','posts.keyword')
                            ->where('posttypes.name','LIKE','%Feature post at homepage%')
                            ->orderBy('id','ASC')
                            ->take(1)
                            ->get();
        $idpostFeaturehomeTop = $postfeatureathomeTop[0]->id;

        $postfeatureathome = DB::table('posts')
                            ->join('posttypes','posts.posttype_id','=','posttypes.id')
                            ->select('posts.id','posts.name','posts.alias','posts.intro','posts.content','posts.image','posts.keyword')
                            ->where([
                                ['posttypes.name','LIKE','%Feature post at homepage%'],
                                ['posts.id','<>',$idpostFeaturehomeTop]
                            ])
                            ->orderBy('id','ASC')
                            ->get();
        $lastQuote = DB::table('milestones')
                    ->select('milestones.name','milestones.content','milestones.author')
                    ->orderBy('id','DESC')
                    ->take(1)
                    ->get();
        return view('fe.pages.home',compact('services','postmenuathome','slides','postfeatureathome','postfeatureathomeTop','lastQuote'));
    }
}
