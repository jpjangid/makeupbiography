<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $pages1 = DB::table('pages')->where(['flag' => '0', 'status' => 1])->get();

            $pages = new Collection;
            foreach ($pages1 as $page) {
                $pages->push([
                    'id'    => $page->id,
                    'title'  => $page->title,
                    'slug'  => $page->slug,
                    'status' => $page->status
                ]);
            }

            return Datatables::of($pages)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="page_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/pages/delete', $row['id']);
                    $edit_url = url('admin/pages/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }

        return view('backend.pages.index');
    }

    public function create()
    {
        return view('backend.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'                 =>  'required',
            'description'           =>  'required',
            'slug'                  =>  'required',
        ], [
            'title.required'                =>  'Page Title is required',
            'description.required'          =>  'Page Description is required',
            'slug.required'                 =>  'Page Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/pages/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/pages/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        Page::create([
            'slug'                      =>  $request->slug,
            'title'                     =>  $request->title,
            'description'               =>  $request->description,
            'featured_image'            =>  $featured_image,
            'meta_title'                =>  $request->meta_title,
            'meta_description'          =>  $request->meta_description,
            'keywords'                  =>  $request->keywords,
            'tags'                      =>  $request->tags,
            'alt'                       =>  $request->alt,
            'status'                    =>  $status,
            'og_title'                  =>  $request->og_title,
            'og_description'            =>  $request->og_description,
            'og_image'                  =>  $og_image,
            'og_alt'                    =>  $request->og_alt,
        ]);

        return redirect('admin/pages')->with('success', 'Page Created Successfully');
    }

    public function update_status(Request $request)
    {
        $page = Page::find($request->page_id);
        $page->status   = $request->status == 1 ? 0 : 1;
        $page->update();

        return response()->json(['message' => 'Page status updated successfully.']);
    }

    public function edit($id)
    {
        $page = DB::table('pages')->find($id);

        return view('backend.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'                 =>  'required',
            'description'           =>  'required',
            'slug'                  =>  'required',
        ], [
            'title.required'                =>  'Page Title is required',
            'description.required'          =>  'Page Description is required',
            'slug'                          =>  'Page Slug is required',
        ]);

        $page = Page::find($id);

        $featured_image = $page->featured_image;
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/pages/', $file, $featured_image);
        }

        $og_image = $page->og_image;
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/pages/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        $page->slug                     =  $request->slug;
        $page->title                    =  $request->title;
        $page->description              =  $request->description;
        $page->featured_image           =  $featured_image;
        $page->meta_title               =  $request->meta_title;
        $page->meta_description         =  $request->meta_description;
        $page->keywords                 =  $request->keywords;
        $page->tags                     =  $request->tags;
        $page->alt                      =  $request->alt;
        $page->status                   =  $status;
        $page->og_title                 =  $request->og_title;
        $page->og_description           =  $request->og_description;
        $page->og_image                 =  $og_image;
        $page->og_alt                   =  $request->og_alt;
        $page->update();

        return redirect('admin/pages')->with('success', 'Page Updated Successfully');
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        $page->flag   =   '1';
        $page->update();

        return redirect('admin/pages')->with('danger', 'Page Deleted');
    }
}
