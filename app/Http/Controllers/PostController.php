<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Post $post){
        $posts = Post::with('user')->get();
        return view("chat.post")->with(["posts"=>$post->getByLimit()]);
    }
    public function create(){
        return view("chat.create");
    }
    
    public function show(Post $post){
         return view("chat.show")->with(["post"=>$post]);
        
    }
    
    public function store(Request $request, Post $post)
{
   
        $post->cotent = $request->input('cotent');
      

    $image = $request->file('image');
    $path = $image->store('public');
    $post->image = $path;
        $post->save();
    return redirect('/post/posts/' . $post->id);
}

    public function delete(Post $post){
        $post->delete();
        return redirect('/post');
    }
    
    public function search(Request $request){
        $keyword = $request->input('keyword');

         if (!empty($keyword)){
            $posts = Post::
                where('cotent','LIKE',"%{$keyword}%")->get();
           
            }
        else {
            $posts = Post::get();
        }

        return view('chat.post', [
            'posts' => $posts,
            'keyword' => $request->keyword
        ]);
    }
}
