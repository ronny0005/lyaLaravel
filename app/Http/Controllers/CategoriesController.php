<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::all();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
            ,'fileUpload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $imagePath = "";
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $imagePath = "$profileImage";
        }
        $category = new Categories([
            'title'=>  $request->get('title')
            ,'description'=>  $request->get('description')
            ,'image' => $imagePath
        ]);
        $category->save();
        return redirect('/categories')->with('success', $category->title.' a bien été crée !');
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
        return Categories::find($id);
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
        $categories = Categories::find($id);
        return view('categories.edit', compact('categories'));
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
            'title'=> 'required'
            ,'fileUpload' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $categories = Categories::find($id);
        $categories->title =  $request->get('title');
        $categories->description =  $request->get('description');
        if ($files = $request->file('fileUpload')) {
            $destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['image'] = "$profileImage";
            $categories->image = $insert['image'];
        }
        $categories->save();
        return redirect('/categories')->with('success', $categories->title.' a été mis à jour !');
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
        $categories = Categories::find($id);
        $categories->delete();
        return redirect('/categories')->with('success', $categories->title.' a été supprimé !');
    }
}
