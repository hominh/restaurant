<?php
    namespace App\Http\Controllers;

    use App\Http\Requests;
    use Illuminate\Http\Request;
    use App\Service;
    use App\Post;
    use App\Posttype;
    use App\Slide;
    use App\Tag;
    use App\Post_Tag;
    use DB;
    class PostController extends Controller {
        public function index() {
            return view('fe.pages.post');
        }


        public function show($id) {
            if(is_numeric($id)) {
                $post = Post::find($id);
            }
            else {
                $columnFind = 'alias';
                $post = DB::table('posts')
                        ->leftjoin('users','posts.user_id','=','users.id')
                        ->select('posts.*','users.id as uid','users.about as about','users.name as uname','users.image as uimage')
                        ->where($columnFind,'=',$id)
                        ->get();
            }
            $idPost = $post[0]->id;

            $tagsByPostId = $this->getTagByPostId($idPost);
            $comments = DB::table('comments')
                        ->join('post_comments','comments.id','=','post_comments.comment_id')
                        ->select('comments.id','comments.name','comments.email','comments.content')
                        ->where('post_comments.post_id','=',$idPost)
                        ->get();


            ///dd($comments);
            return view('fe.pages.post',compact('post','recentposts','tags','comments','tagsByPostId'));
        }

        public function getTagByPostId($idPost) {
            $tag = DB::select(DB::raw("select `tags`.`name`,tags.alias, `tags`.`id`, `post_tags`.`post_id` from `tags` left join `post_tags` on `tags`.`id` = `post_tags`.`tag_id` where `post_tags`.`post_id` = (".$idPost.")"));
            return $tag;
        }


    }
 ?>
