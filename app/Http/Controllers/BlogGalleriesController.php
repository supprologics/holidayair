<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogGallery;

class BlogGalleriesController extends Controller
{
    public function galleryview(Blog $blog)
    {
        return view('admin.blogs.gallery')->with('blog',$blog)->with('gallery',BlogGallery::all()->where('post_id',$blog->id));
    }

    function upload(Request $request)
    {
        $image = $request->file('file');
        $imageName = uniqid().time() . '.' . $image->extension();
        $image->move(public_path('images/blog'), $imageName);
        BlogGallery::create([
            'file_path'=>$imageName,
            'post_id'=>$request->post_id,
        ]);
        return response()->json(['success' => $imageName]);
    }

    function fetch(Request $request)
    {
        $gallery=BlogGallery::all()->where('post_id',$request->post_id);
        $output = '<div class="row">';
        foreach($gallery as $image)
            {
            $output .= '
            <div class="col-md-3">
                <div class="card mb-4" >
                    <div class="view overlay">
                    <img class="card-img-top" src="'.asset('images/blog/' . $image->file_path).'"
                    alt="Card image cap" style="width:400px; height:250px">
                    <div class="mask rgba-white-slight "></div>
                    </div>
                
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm remove_image float-right" id="'.$image->file_path.'"><em class="icon ni ni-trash"></em></button>
                    </div>
                </div>
            </div>
            ';
        }
        $output .= '</div>';
        echo $output;
    }

    function delete(Request $request)
    {
        if($request->get('name'))
        {
            $del_id=$request->name;
            BlogGallery::where('file_path', $del_id)->delete();
            \File::delete(public_path('images/blog/' . $request->get('name')));
        }
    }

}
