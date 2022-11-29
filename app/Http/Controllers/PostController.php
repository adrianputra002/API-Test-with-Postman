<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $post = Post::where('id', '=', $id)->get();
        return $post;
    }
    public function limit($limit)
    {
        $post = Post::limit($limit)->get();
        return $post;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Title' => 'required|min:20',
            'Content' => 'required|min:200',
            'Category' => 'required|min:3',
            'Status' => 'required|in:publish,draft,trash',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {


            $post = new Post();
            $post->Title = $request->Title;
            $post->Content = $request->Content;
            $post->Category = $request->Category;
            $post->Status = $request->Status;
            $post->save();
            return response()->json([
                "Message" => "Post Add"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Title' => 'required|min:20',
            'Content' => 'required|min:200',
            'Category' => 'required|min:3',
            'Status' => 'required|in:publish,draft,trash',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {

            $post = Post::where("id","=",$id)->first();

            $post->Title = $request->Title;
            $post->Content = $request->Content;
            $post->Category = $request->Category;
            $post->Status = $request->Status;
            $post->save();
            return response()->json([
                "Message" => "Post updated"
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return response()->json([
            "Message" => "Post deleted"
        ]);
    }
}
