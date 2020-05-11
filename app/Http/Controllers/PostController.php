<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
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
     * Display a listing of the resource.
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
        return \view('posts.index' , ['posts' => $posts]);
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
            'body' => 'required'
        ]);
        // create new post obj
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = \auth()->user()->id;
        $post->save();

        return \redirect('/posts')->with('success' , 'Post is created');
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
        $post->delete();
        return \redirect('/posts')->with('success' , 'Post Deleted');
    }

    
}
