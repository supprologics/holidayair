<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use App\Country;
use App\Area;
use App\Http\Requests\Blogs\BlogsCreateRequest;
use App\Http\Requests\Blogs\BlogsUpdateRequest;

class BlogsController extends Controller
{
    public function __construct(){
        $this->middleware('verifyBlogCategoryCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogs.index')->with('blogs',Blog::all())->with('blogcategories',BlogCategory::all())->with('countries',Country::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create')->with('blogcategories',BlogCategory::all())->with('countries',Country::all())->with('areas',Area::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogsCreateRequest $request)
    {

        $blog=Blog::create([
            'blog_category_id'=>$request->blog_category_id,
            'name'=>$request->name,
            'description_short'=>$request->description_short,
            'description_full'=>$request->description_full,
            'tags'=>$request->tags,
            'flag'=>'0',
            'amount'=>$request->amount,
        ]);

        session()->flash('success','New Post added.');
        return redirect(route('bloggalleryview',$blog->id));
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
    public function edit(Blog $blog)
    {
        return view('admin.blogs.create')->with('post',$blog)->with('blogcategories',BlogCategory::all())->with('countries',Country::all())->with('areas',Area::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogsUpdateRequest $request,Blog $blog)
    {

        $blog->update([
            'blog_category_id'=>$request->blog_category_id,
            'name'=>$request->name,
            'description_short'=>$request->description_short,
            'description_full'=>$request->description_full,
            'tags'=>$request->tags,
            'amount'=>$request->amount,
        ]);

        session()->flash('success','Post Updaated.');
        return redirect(route('bloggalleryview',$blog->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        session()->flash('success','Post Deleted');
        return redirect(route('blogs.index'));
    }

    public function publish(Blog $blog)
    {
        if($blog->gallery->count()==0){
            session()->flash('error','Please upload post images for publish post');
            return redirect(route('bloggalleryview' ,$blog->id));
        }
        else{
            $blog->Update([
                'flag'=>1,
            ]);
        }
        return $this->index();
        
    }
    
    public function draft(Blog $blog)
    {
        $blog->Update([
            'flag'=>0,
        ]);
        return $this->index();
        
    }

    public function status(Blog $blog){
        
        if($blog->flag=='1'){            
            $blog->flag='0';
            $blog->save();
            session()->flash('success','Post Saved as draft');
        }
        else{
            if($blog->gallery->count()==0){
                session()->flash('error','Please upload post images for publish post');
                return redirect(route('bloggalleryview' ,$blog->id));
            }
            $blog->flag='1';
            $blog->save();
            session()->flash('success','Post Published');
        }
        return $this->index();

    }


}
