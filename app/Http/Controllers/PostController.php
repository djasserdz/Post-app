<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $posts=Post::latest()->paginate(5);
        return view('user.dashboard',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $user=auth()->user();

        $request->validate([
            'title'=>['required'],
            'body'=>['required'],
            'image'=>['image','mimes:png,jpg,jpeg'],
        ]);
        $path=null;
        if($request->has('image')){
           $path=Storage::disk('public')->put('post_images',$request->image);
        }
        else{
            $path='system_images/post.png';
        }

        $user->post()->create([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
            'image_path'=>$path,
        ]);

        return back()->with('true','Post added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if(Gate::allows('update_post',$post)){
            return view('post.edit',['post'=>$post]);
        }
        else{
            abort(403,'bitch');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>['required'],
            'body'=>['required'],
            'image'=>['image','mimes:png,jpg,jpeg'],
        ]);
        $path=null;
        if($request->has('image')){
            $old_image=File::delete($post->image_path);
            $path=Storage::disk('public')->put('post_images',$request->image);
        }

        $post->update([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
            'image_path'=>$path,
        ]);

        return back()->with('true','Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post_imagepath=$post->image_path;
        if($post_imagepath!='system_images/post.png'){
            File::delete('storage/'.$post_imagepath);
        }
        $post->delete();
        return back()->with('true','Post deleted!');
    }
    public function homepage(Post $post){
        $posts=Post::latest()->paginate(5);
        return view('post.index',['posts'=>$posts]);
    }
}
