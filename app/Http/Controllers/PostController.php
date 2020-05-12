<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use App\User;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // authintication using middleware
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource - App homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all posts from DB

        // $posts = Post::all();
        // $posts = Post::orderBy('id' , 'desc')->get();
        // $posts = Post::where('id' , '2')->get();
        // $posts = DB::select('select * from posts');

        $posts = Post::orderBy('created_at' , 'desc')->get();
        return \view('posts.home' , ['posts' => $posts]);
    }

    /**
     * Show profile posts of the usesr.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        // get user id
        $user_id = \auth()->user()->id;
        // get the user with its id
        $user = User::find($user_id);
        
        return view('posts.profile' , ['posts' => $user->posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request , [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // Handle file to upload
        if ($file = $request->file('image')) {
            // Get the file name with extension
            $filenameWithExt = $file->getClientOriginalName();
            // Get just filename 
            $filename = \pathinfo($filenameWithExt , PATHINFO_FILENAME);
            // Get just extension
            $extension = $file->extension();
            // pattern for fileToStore
            $filenameToStore = date('YmdHis') . "." . $extension;
            $path = $file->storeAs('public/images' , $filenameToStore);
         }
  
        // create new post obj
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->image = $filenameToStore;
        $post->user_id = \auth()->user()->id;
        $post->save();

        return \redirect('/')->with('success' , 'Post is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return \view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (\auth()->user()->id !== $post->user_id) {
            return \redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return \view('posts.edit', ['post' => $post]);
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
         // validation
         $this->validate($request , [
            'title' => 'required',
            'body' => 'required'
        ]);
        // find post by id
        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return \redirect('/posts')->with('success' , 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (\auth()->user()->id !== $post->user_id) {
            return \redirect('/posts')->with('error', 'Unauthorized Page');
        }
        // delete the file from storage/app/public/images
        Storage::delete("public/images/$post->image");
        $post->delete();
        return \redirect('/')->with('success' , 'Post Deleted');
    }
    
}
