<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;
use App\Http\Requests\BlogCategories\BlogCategoriesCreateRequest;
use App\Http\Requests\BlogCategories\BlogCategoriesUpdateRequest;

class BlogCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog_categories.index')->with('blog_categories',BlogCategory::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoriesCreateRequest $request)
    {
        BlogCategory::create([
            'name'=>$request->name,
        ]);

        session()->flash('success','New blog category added');
        return redirect(route('blogcategories.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogcategory)
    {
        return view('admin.blog_categories.create')->with('blog_category',$blogcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoriesUpdateRequest $request,BlogCategory $blogcategory)
    {
        $blogcategory->update([
            'name'=>$request->name,
        ]);

        session()->flash('success','Blog Category Updated');
        return redirect(route('blogcategories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogcategory)
    {
        $blogcategory->delete();

        session()->flash('success','Blog Category Deleted');
        return redirect(route('blogcategories.index'));
    }
}
