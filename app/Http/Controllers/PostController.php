<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = post::with('user')->get();
        return view('article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('article.create');
    }

    public function crt()
    {
        $categories = Post::distinct()->pluck('category_id');
        // dd($categories);
        return view('article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title'=>'required',
            'excerpt'=>'required'
        ]);
        $user_id=Auth::user()->id;
        $status=0;
        if ( $request->status == "on") {
            $status=1;
            # code...
        }
        $title=$request->title;
        $slug=Str::slug($title);
        Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$status,
            'category_id'=>$request->category,
            'user_id'=>$user_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($post)
    {
        // dd($post);
       $post = post::find($post)->with('user')->get();
        return view('article.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
