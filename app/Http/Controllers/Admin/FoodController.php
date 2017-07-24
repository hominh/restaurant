<?php

    namespace App\Http\Controllers\Admin;

    use File;
    use Illuminate\Http\Request;
    use App\Http\Requests;;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Input;
    use App\Food;
    use App\User;
    use App\Foodtype;
    //use App\Http\Requests\FoodRequest;
    use DB;
    use Auth;
    use App\Tag;
    use App\Food_Tag;
    class FoodController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            $data = DB::table('foods')
                ->join('users','foods.user_id','=','users.id')
                ->select('foods.id as id', 'foods.name as fname','foods.keyword','users.name as uname','foods.created_at')
                ->get();
            return view('admin/food/list',compact('data'));
        }


        public function create() {
            $foodtype = Foodtype::select('name','id','parent_id')->get()->toArray();
            return view('admin/food/add',compact('foodtype'));
        }

        public function store(Request $request) {
            $this->validate($request, [
               'name' => 'required|unique:foods|min:5',
               'content' => 'required|min:5'
           ]);
            $food = new Food;
            $food->name = $request->name;
            $food->alias = changeTitle($request->name);
            $food->keyword = $request->keyword;
            $food->description = $request->description;
            $food->price = $request->price;
            $food->intro = $request->intro;
            $food->content = $request->content;


            if(Input::hasFile('image')) {
                $imageTempName = $request->file('image')->getPathname();
                $imageName = $request->file('image')->getClientOriginalName();
                $path = public_path("images/food/");
                $request->file('image')->move($path , $imageName);
                $food->image = $imageName;
            }
            $food->foodtype_id = $request->foodtype;
            $food->user_id = Auth::user()->id;
            $food->save();
            $food_id = $food->id;
            $tag = $request->tag;
            if($tag != "" || $tag != NULL) {
                $tags = explode(",", $tag);
                foreach ($tags as $t) {
                    $checkExistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                    if(count($checkExistTag) <= 0) { //If don't have tag
                        $tagObj = new Tag;
                        $tagObj->name = $t;
                        $tagObj->save();
                        $idTag = $tagObj->id;
                    }
                    else { //If have tag
                        $checkexistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                        $idTag = $checkexistTag[0]->id;
                    }
                    $food_tagObj = new Food_Tag;
                    $food_tagObj->food_id = $food_id;
                    $food_tagObj->tag_id = $idTag;
                    $food_tagObj->save();
                }
            }
            return redirect()->route('admin.food.list');
        }

        public function edit($id)
        {
            //data
            $data = Food::findOrFail($id)->toArray();

            //tag
            $tags = DB::table('tags')
                    ->join('food__tags','tags.id','=','food__tags.tag_id')
                    ->select('tags.name')
                    ->where('food__tags.food_id','=',$id)
                    ->get();
            $strTag = "";
            foreach($tags as $tag) {
                $strTag.= $tag->name.",";

            }
            $strTag = substr($strTag,0,-1);

            //foodtypes
            $currentFoodtypeobj = DB::table('foodtypes')
                                ->join('foods','foodtypes.id','=','foodtype_id')
                                ->select('foodtypes.id as idft','foodtypes.name as nameft')
                                ->where('foods.id','=',$id)
                                ->get();
            $idft = $currentFoodtypeobj[0]->idft;

            $otherFoodtypeobj = DB::table('foodtypes')
                                ->select('foodtypes.id as idft','foodtypes.name as nameft')
                                ->where('foodtypes.id','<>',$idft)
                                ->get();

            //Image

            return view('admin.food.edit',compact('data','id','strTag','currentFoodtypeobj','otherFoodtypeobj'));
        }

        public function getDelImg($id,Request $request) {
            if($request->ajax()) {

                $idFood = (int)$request->get('idFood');
                $foodDetail = Food::find($idFood);
                //dd($idFood);

                if(!empty($foodDetail)) {
                    $img = public_path("images/food/");
                    $img.= $foodDetail->image;

                    if(File::exists($img)) {
                        File::delete($img);
                    }
                    //Update image = Null
                    $foodDetail->image = "";
                    $foodDetail->save();

                }

                return "ok";
            }
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
               'name' => 'required|min:5',
               'content' => 'required|min:5'
           ]);
            DB::table('food__tags')->where('food_id', '=', $id)->delete();
            $tag = $request->tag;
            if($tag != "" || $tag != NULL) {
                $tags = explode(",", $tag);
                foreach ($tags as $t) {
                    $checkExistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                    if(count($checkExistTag) <= 0) { //If don't have tag
                        $tagObj = new Tag;
                        $tagObj->name = $t;
                        $tagObj->save();
                        $idTag = $tagObj->id;
                    }
                    else { //If have tag
                        $checkexistTag = DB::table('tags')->select('id','name')->orderBy('id','DESC')->where('tags.name',$t)->get();
                        $idTag = $checkexistTag[0]->id;
                    }
                    $food_tagObj = new Food_Tag;
                    $food_tagObj->food_id = $id;
                    $food_tagObj->tag_id = $idTag;
                    $food_tagObj->save();
                }
            }




            $food = Food::find($id);

            $food->name = $request->name;
            $food->alias = changeTitle($request->name);
            $food->keyword = $request->keyword;
            $food->description = $request->description;
            $food->price = $request->price;
            $food->intro = $request->intro;
            $food->content = $request->content;

            //Image
            if($request->newimage != "" || $request->newimage != NULL) {
                if(Input::hasFile('newimage')) {
                    $imageTempName = $request->file('newimage')->getPathname();
                    $imageName = $request->file('newimage')->getClientOriginalName();
                    $path = public_path("images/food/");
                    $request->file('newimage')->move($path , $imageName);
                    $food->image = $imageName;
                }
            }

            $food->foodtype_id = $request->foodtype;
            $food->user_id = Auth::user()->id;
            $food->save();
            return redirect()->route('admin.food.list');

        }

        public function delete($id)
        {
            $food = Food::find($id);
            $food->delete();
            return redirect()->route('admin.food.list');
        }
    }

?>
