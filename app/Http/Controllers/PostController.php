<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Suppprt\Str;

class PostController extends Controller
{

    public function __construct(){

         $this->middleware('auth');
    }


    public function index()
    {

        $posts = Post::all();
        return view('posts.index')->with('posts' , $posts);

    }


    public function postsTrashed()
    {

         $post = Post::onlyTrashed()->get();
         return view('posts.trashed')->with('post' , $post);
    }

    public function create()
    {
        $tags = Tag::all();
        if ($tags->count()== 0 ) {
            return redirect()->route('tag.create');
        }

        return view('posts.create')->with('tags' , $tags);
    }


    public function store(Request $request)
    {

            $this->validate($request , [

                'title' =>'required' ,
                'content'=>'required' ,
                'tags'=>'required' ,
                'photo' =>'required|image'


            ]);

            $photo = $request->photo;
            $newphoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts/', $newphoto);

            $post = Post::create([

                'title' => $request->title ,
                 'user_id' => Auth::id() ,
                'content' => $request->content ,
                 'photo' => 'uploads/posts/'.$newphoto,
                 'slug'=> $request->title,
                 'tag' => $request->tag

            ]);

             $post->tag()->attach($request->tags);

             return redirect()->back();

    }


    public function show($slug)
    {
        $tags = Tag::all();

        $post = Post::where('slug' , $slug)->first();
        return view('posts.show')->with('post' ,$post)->with('tags' , $tags);
    }


    public function edit($id)
    {
        $tags = Tag::all();

        $post = Post::where('id' , $id)->where('user_id' , Auth::id())->first();

        if ($post === null) {
            return redirect()->back();
        }

        return view('posts.edit')->with('post' ,$post)->with('tags' , $tags);

    }


    public function update(Request $request, $id)
    {
        $tags = Tag::all();

        $post = Post::where('id' , $id)->where('user_id' , Auth::id())->first();

        if ($post === null) {
            return redirect()->back();
        }

            $this->validate($request , [


                'title' =>'required' ,
                'content'=>'required' ,
               // 'photo' => 'required'
            ]);

            if ($request->has('photo')) {

                $photo = $request->photo;
                $newphoto = time().$photo->getClientOriginalName();
                 $photo->move('uploads/posts/', $newphoto);
                 $post->photo = 'uploads/posts/'.$newphoto;
            }

            $tags->tag = $request->tag;
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            $post->tag()->sync($request->$tags);
            return redirect()->back();
    }



    public function destroy($id)
    {
        $post = Post::where('id' , $id)->where('user_id' , Auth::id())->first();
        if ($post === null) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->back();

    }

    public function restore($id)
    {

        $post = Post::withTrashed()->where('id' , $id)->where('user_id' , Auth::id())->first();
        if ($post === null) {
            return redirect()->back();
        }
        $post->restore();
        return redirect()->back();
    }

    public function hdelete($id)
    {

        $post = Post::withTrashed()->where('id' , $id)->where('user_id' , Auth::id())->first();
        if ($post === null) {
            return redirect()->back();
        }
        $post->forceDelete();
        return redirect()->back();
    }
}
