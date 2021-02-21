<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $posts = Posts::all();
        $categories = Categories::all();
        $users = User::all();
        return view('posts.create', compact('posts','categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required'
            ,'description' => 'required'
            ,'authorId' => 'required'
            ,'categoriesId' => 'required'
            ,'fileUpload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imagePath = "";
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $imagePath = "$profileImage";
        }
        $post = new Posts([
            'title'=>  $request->get('title')
            ,'description'=>  $request->get('description')
            ,'categoriesId' => $request->get('categoriesId')
            ,'authorId' => $request->get('authorId')
            ,'image' => $imagePath
        ]);
        $post->save();
        return redirect('/posts')->with('success', $post->title.' a bien été crée !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Posts::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Posts::find($id);
        $categories = Categories::all();
        $users = User::all();
        return view('posts.edit', compact('post','categories','users'));
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
        //
        $request->validate([
            'title'=>'required'
            ,'description' => 'required'
            ,'authorId' => 'required'
            ,'categoriesId' => 'required'
            ,'fileUpload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $posts = Posts::find($id);
        $posts->title =  $request->get('title');
        $posts->description =  $request->get('description');
        $posts->authorId =  $request->get('authorId');
        $posts->categoriesId =  $request->get('categoriesId');
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";
            $posts->image = $insert['image'];
        }
        $posts->save();
        return redirect('/posts')->with('success', $posts->title.' a été mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = Posts::find($id);
        $posts->delete();
        return redirect('/posts')->with('success', $posts->title.' a été supprimé !');
    }
}
