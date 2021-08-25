<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;
use DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        //
        $categories = Category::where('flag',0)->get();
        return view('backend.category.index',compact('categories'));
    }

    public function create()
    {
        if (request()->ajax()) {
            $categories1 = Category::select('id','name','status')->where('flag',0)->get();

            $categories = new Collection;
            foreach($categories1 as $category1) {
                $materials->push([
                    'id'    => $category1->id,
                    'name'  => $category1->name,
                    'status'=> $category1->status 
                ]);    
            }

            return Datatables::of($materials)
                    ->addIndexColumn()
                    ->addColumn('active', function($row) use ($permissions) {
                        $checked = $row['status'] == '0' ? 'checked' : '';
                        $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="'.$row['id'].'" class="category_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="'.row['status'].'" '.$checked.'>
                                    </div>';

                      return $active;
                    })
                    ->addColumn('action', function($row) use ($permissions) {
                           $delete_url = url('/categories/delete',$row['id']);
                           $edit_url = url('/categories/edit',$row['id']);
                           $btn = '<a class="btn btn-primary btn-sm ml-1" href="'.$edit_url.'"><i class="fas fa-edit"></i></a>';
                           $btn .= '<a class="btn btn-info btn-sm ml-1" href="'.$delete_url.'"><i class="fa fa-trash"></i></a>'; 
                           return $btn;
                    })
                    ->rawColumns(['action','active'])
                    ->make(true);
        }
            
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name',
            'description'           =>  'required',
            'short_description'     =>  'required',
            'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug',
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            $path = Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if(isset($request->status)){
            $status = 1;
        }

        Category::create([
            'slug'                      =>  $request->slug,
            'name'                      =>  $request->name,
            'parent_id'                 =>  $request->parent_id,
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
        
        return redirect('categories')->with('success','Category added successfully');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
