<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;
use DataTables;
use Illuminate\Support\Collection;

class BrandController extends Controller
{
    public function index()
    {
        
        if (request()->ajax()) {
            $brands1 = Brand::where(['flag' => 0,'status' => 1])->get();

            $brands = new Collection;
            foreach($brands1 as $brand) {
                $brands->push([
                    'id'    => $brand->id,
                    'name'  => $brand->name,
                    'slug'  => $brand->slug,
                    'status'=> $brand->status 
                ]);    
            }

            return Datatables::of($brands)
                    ->addIndexColumn()
                    ->addColumn('active', function($row) {
                        $checked = $row['status'] == '1' ? 'checked' : '';
                        $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="'.$row['id'].'" class="category_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="'.$row['status'].'" '.$checked.'>
                                    </div>';

                      return $active;
                    })
                    ->addColumn('action', function($row) {
                           $delete_url = url('admin/brands/delete',$row['id']);
                           $edit_url = url('admin/brands/edit',$row['id']);
                           $btn = '<a class="btn btn-primary btn-sm ml-1" href="'.$edit_url.'"><i class="fas fa-edit"></i></a>';
                           $btn .= '<a class="btn btn-info btn-sm ml-1" href="'.$delete_url.'"><i class="fa fa-trash"></i></a>'; 
                           return $btn;
                    })
                    ->rawColumns(['action','active'])
                    ->make(true);
        }
        return view('backend.brand.index');
    }

    public function create()
    {
        return view('backend.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  =>  'required|unique:brands,name',
            'description'           =>  'required',
            'short_description'     =>  'required',
            'alt'                   =>  'required',
            'slug'                  =>  'required|unique:brands,slug',
        ], [
            'name.required'                 =>  'Brand Name is required',
            'description.required'          =>  'Brand Description is required',
            'short_description.required'    =>  'Brand Short Description is required',
            'alt.required'                  =>  'Featured Image Alt text is required',
            'slug.required'                 =>  'Brand Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/brands/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/brands/og_images', $file, $og_image);
        }

        $status = 0;
        if(isset($request->status)){
            $status = 1;
        }

        Brand::create([
            'slug'                      =>  $request->slug,
            'name'                      =>  $request->name,
            'description'               =>  $request->description,
            'short_description'         =>  $request->short_description,
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

        return redirect('admin/brands')->with('success','Brand Created Successfully');
    }

    public function update_status(Request $request)
    {
        $brand = Brand::find($request->brand_id);
        $brand->status   = $request->status == 1 ? 0 : 1;
        $brand->update();

        return response()->json(['message' => 'Brand status updated successfully.']);
    }

    public function show(Brand $brand)
    {
        //
    }

    public function edit($id)
    {
        $brand = Brand::where('id',$id)->first();
        return view('backend.brand.edit',compact('brand'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required|unique:brands,name,'.$id,
            'description'           =>  'required',
            'short_description'     =>  'required',
            'alt'                   =>  'required',
            'slug'                  =>  'required|unique:brands,slug,'.$id,
        ], [
            'name.required'                 =>  'Brand Name is required',
            'description.required'          =>  'Brand Description is required',
            'short_description.required'    =>  'Brand Short Description is required',
            'alt.required'                  =>  'Featured Image Alt text is required',
            'slug.required'                 =>  'Brand Slug is required',
        ]);

        $brand = Brand::find($id);

        $featured_image = $brand->featured_image;
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/brands/', $file, $featured_image);
        }

        $og_image = $brand->og_image;
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/brands/og_images', $file, $og_image);
        }

        $status = 0;
        if(isset($request->status)){
            $status = 1;
        }

        $brand->slug                     =  $request->slug;
        $brand->name                     =  $request->name;
        $brand->description              =  $request->description;
        $brand->short_description        =  $request->short_description;
        $brand->featured_image           =  $featured_image;
        $brand->meta_title               =  $request->meta_title;
        $brand->meta_description         =  $request->meta_description;
        $brand->keywords                 =  $request->keywords;
        $brand->tags                     =  $request->tags;
        $brand->alt                      =  $request->alt;
        $brand->status                   =  $status;
        $brand->og_title                 =  $request->og_title;
        $brand->og_description           =  $request->og_description;
        $brand->og_image                 =  $og_image;
        $brand->og_alt                   =  $request->og_alt;
        $brand->update();

        return redirect('admin/brands')->with('success','Brand Updated Successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->flag   =   '1';
        $brand->update();

        return redirect('admin/brands')->with('danger', 'Brand Deleted');
    }
}
