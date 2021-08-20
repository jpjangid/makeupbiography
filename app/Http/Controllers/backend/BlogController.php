<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('flag', '0')->get();

        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                 =>  'required',
            'description'           =>  'required',
            'short_description'     =>  'required',
            'publish_date'          =>  'required',
            'alt'                   =>  'required',
            'slug'                  =>  'required',
        ], [
            'title.required'                =>  'Blog Title is required',
            'description.required'          =>  'Blog Description is required',
            'short_description.required'    =>  'Blog Short Description is required',
            'publish_date.required'         =>  'Blog Publish Date is required',
            'alt.required'                  =>  'Featured Image Alt text is required',
            'slug.required'                 =>  'Blog Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/blogs/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/blogs/og_images', $file, $og_image);
        }

        $status = 0;
        if(isset($request->status)){
            $status = 1;
        }

        Blog::create([
            'slug'                      =>  $request->slug,
            'title'                     =>  $request->title,
            'description'               =>  $request->description,
            'short_description'         =>  $request->short_description,
            'featured_image'            =>  $featured_image,
            'meta_title'                =>  $request->meta_title,
            'meta_description'          =>  $request->meta_description,
            'keywords'                  =>  $request->keywords,
            'tags'                      =>  $request->tags,
            'publish_date'              =>  $request->publish_date,
            'alt'                       =>  $request->alt,
            'status'                    =>  $status,
            'category'                  =>  $request->category,
            'og_title'                  =>  $request->og_title,
            'og_description'            =>  $request->og_description,
            'og_image'                  =>  $og_image,
            'og_alt'                    =>  $request->og_alt,
        ]);

        return redirect('admin/blogs')->with('success', 'Blog Created Successfully');
    }

    public function update_status(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $blog->status   = $request->status == 1 ? 0 : 1;
        $blog->update();

        return response()->json(['message' => 'Blog status updated successfully.']);
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('backend.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'                 =>  'required',
            'description'           =>  'required',
            'short_description'     =>  'required',
            'publish_date'          =>  'required',
            'alt'                   =>  'required',
            'slug'                  =>  'required',
        ], [
            'title.required'                =>  'Blog Title is required',
            'description.required'          =>  'Blog Description is required',
            'short_description.required'    =>  'Blog Short Description is required',
            'publish_date.required'         =>  'Blog Publish Date is required',
            'alt.required'                  =>  'Featured Image Alt text is required',
            'slug'                          =>  'Blog Slug is required',
        ]);

        $blog = Blog::find($id);

        $featured_image = $blog->featured_image;
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/blogs/', $file, $featured_image);
        }

        $og_image = $blog->og_image;
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/blogs/og_images', $file, $og_image);
        }

        $status = 0;
        if(isset($request->status)){
            $status = 1;
        }

        $blog->slug                     =  $request->slug;
        $blog->title                    =  $request->title;
        $blog->description              =  $request->description;
        $blog->short_description        =  $request->short_description;
        $blog->featured_image           =  $featured_image;
        $blog->meta_title               =  $request->meta_title;
        $blog->meta_description         =  $request->meta_description;
        $blog->keywords                 =  $request->keywords;
        $blog->tags                     =  $request->tags;
        $blog->publish_date             =  $request->publish_date;
        $blog->alt                      =  $request->alt;
        $blog->status                   =  $status;
        $blog->category                 =  $request->category;
        $blog->og_title                 =  $request->og_title;
        $blog->og_description           =  $request->og_description;
        $blog->og_image                 =  $og_image;
        $blog->og_alt                   =  $request->og_alt;
        $blog->update();

        return redirect('admin/blogs')->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->flag   =   '1';
        $blog->update();

        return redirect('admin/blogs')->with('danger', 'Blog Deleted');
    }
}
