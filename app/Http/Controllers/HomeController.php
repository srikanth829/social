<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $post = new post();
        $allPosts = [];
        $allPosts = $post->getAllPosts(auth()->id());
        return view('home')->with('allPosts',$allPosts);

        
    }
    
    
    public function createPost(Request $request){
        
        
        
        $post = new post();
        $allPosts = $post->getAllPosts(auth()->id());
        
        $msg = "";
        if($request->has('post')){
            if($post->createPost($request->all(),auth()->id())){
                echo "This is for create post";
                $msg = "Post successfully created";  
            }
            
        }
        return view('home',$msg,$allPosts);
        
        
    }
}
