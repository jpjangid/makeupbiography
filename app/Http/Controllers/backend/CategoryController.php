<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //code for main parent category 
    public function index()
    {
        if (request()->ajax()) {
            $categories1 = DB::table('categories')->select('id', 'name', 'slug', 'status')->where('flag', 0)->where('parent_id', null)->get();

            $categories = new Collection;
            foreach ($categories1 as $category1) {
                $categories->push([
                    'id'    => $category1->id,
                    'name'  => $category1->name,
                    'slug'  => $category1->slug,
                    'status' => $category1->status
                ]);
            }

            return Datatables::of($categories)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="category_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/categories/delete', $row['id']);
                    $edit_url = url('admin/categories/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
        return view('backend.category.index');
    }

    public function create()
    {

        $categories = DB::table('categories')->where('flag', 0)->get();
        return view('backend.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name',
            'description'           =>  'required',
            'short_description'     =>  'required',
            // 'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug',
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            // 'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        Category::create([
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

        return redirect('admin/categories')->with('success', 'Category added successfully');
    }

    public function update_status(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status   = $request->status == 1 ? 0 : 1;
        $category->update();

        return response()->json(['message' => 'Category status updated successfully.']);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name,' . $id,
            'description'           =>  'required',
            'short_description'     =>  'required',
            // 'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug,' . $id,
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            // 'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        DB::table('categories')->where('id', $id)->update([
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

        return redirect('admin/categories')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->update(['flag' => 1]);
        return redirect('admin/categories')->with('danger', 'Category deleted successfully');
    }

    //level 2 code for sub category
    public function index_sub1()
    {
        if (request()->ajax()) {
            $categories1 = Category::where('flag', 0)->where('parent_id', null)->with('subcategory')->distinct('parent_id')->get();
            $categories = new Collection;
            foreach ($categories1 as $category1) {
                if (!empty($category1->subcategory)) {
                    foreach ($category1->subcategory as $sub) {
                        if ($sub->flag == 0) {
                            $categories->push([
                                'id'    => $sub->id,
                                'main'  => $category1->name,
                                'name'  => $sub->name,
                                'slug'  => $sub->slug,
                                'status' => $sub->status
                            ]);
                        }
                    }
                }
            }

            return Datatables::of($categories)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="category_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/sub/categories/delete', $row['id']);
                    $edit_url = url('admin/sub/categories/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
        return view('backend.category.sub1.index');
    }

    public function update_status_sub1(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status   = $request->status == 1 ? 0 : 1;
        $category->update();

        return response()->json(['message' => 'Sub category status updated successfully.']);
    }

    public function edit_sub1($id)
    {
        $categories = DB::table('categories')->where('parent_id', null)->where(['flag' => 0, 'status' => 1])->get();
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.sub1.edit', compact('category', 'categories'));
    }

    public function update_sub1(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name,' . $id,
            'description'           =>  'required',
            'short_description'     =>  'required',
            // 'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug,' . $id,
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            // 'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        DB::table('categories')->where('id', $id)->update([
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

        return redirect('admin/sub/categories')->with('success', 'Sub category updated successfully');
    }

    public function create_sub1()
    {
        $categories = DB::table('categories')->where('parent_id', null)->where(['flag' => 0, 'status' => 1])->get();
        return view('backend.category.sub1.create', compact('categories'));
    }

    public function store_sub1(Request $request)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name',
            'description'           =>  'required',
            'short_description'     =>  'required',
            // 'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug',
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            // 'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
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

        return redirect('admin/sub/categories')->with('success', 'Sub category added successfully');
    }

    public function destroy_sub1($id)
    {
        DB::table('categories')->where('id', $id)->update(['flag' => 1]);
        return redirect('admin/sub/categories')->with('danger', 'Category deleted successfully');
    }

    //level 3 code for sub category
    public function index_sub2()
    {
        if (request()->ajax()) {
            $categories1 = Category::select('id')->where('flag', 0)->where('parent_id', null)->with('subcategory')->get();
            $categories = new Collection;
            foreach ($categories1 as $cat1) {
                if (!empty($cat1->subcategory)) {
                    foreach ($cat1->subcategory as $cat2) {
                        $main = DB::table('categories')->select('name')->where('id', $cat1->id)->first();
                        $sub = DB::table('categories')->select('name')->where('id', $cat2->id)->first();
                        $subs1 = DB::table('categories')->where('parent_id', $cat2->id)->where('flag', 0)->get();
                        foreach ($subs1 as $sub1) {
                            $categories->push([
                                'id'    => $sub1->id,
                                'main'  => $main->name,
                                'sub'   => $sub->name,
                                'name'  => $sub1->name,
                                'slug'  => $sub1->slug,
                                'status' => $sub1->status
                            ]);
                        }
                    }
                }
            }

            return Datatables::of($categories)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="category_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/sub/sub/categories/delete', $row['id']);
                    $edit_url = url('admin/sub/sub/categories/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
        return view('backend.category.sub2.index');
    }

    public function update_status_sub2(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status   = $request->status == 1 ? 0 : 1;
        $category->update();

        return response()->json(['message' => 'Sub Sub category status updated successfully.']);
    }

    public function create_sub2()
    {
        $categories1 = Category::select('id')->where(['flag' => 0, 'status' => 1])->where('parent_id', null)->with(['subcategory' => function ($query) {
            $query->where(['flag' => 0, 'status' => 1]);
        }])->get();
        $categories = new Collection;
        foreach ($categories1 as $cat1) {
            if (!empty($cat1->subcategory)) {
                foreach ($cat1->subcategory as $cat2) {
                    $categories->push([
                        'id'    => $cat2->id,
                        'name'  => $cat2->name,
                    ]);
                }
            }
        }

        return view('backend.category.sub2.create', compact('categories'));
    }

    public function store_sub2(Request $request)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name',
            'description'           =>  'required',
            'short_description'     =>  'required',
            // 'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug',
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            // 'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
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

        return redirect('admin/sub/sub/categories')->with('success', 'Sub Sub category added successfully');
    }

    public function edit_sub2($id)
    {
        $categories1 = Category::select('id')->where(['flag' => 0, 'status' => 1])->where('parent_id', null)->with(['subcategory' => function ($query) {
            $query->where(['flag' => 0, 'status' => 1]);
        }])->get();
        $categories = new Collection;
        foreach ($categories1 as $cat1) {
            if (!empty($cat1->subcategory)) {
                foreach ($cat1->subcategory as $cat2) {
                    $categories->push([
                        'id'    => $cat2->id,
                        'name'  => $cat2->name,
                    ]);
                }
            }
        }

        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.category.sub2.edit', compact('category', 'categories'));
    }

    public function update_sub2(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required|unique:categories,name,' . $id,
            'description'           =>  'required',
            'short_description'     =>  'required',
            // 'alt'                   =>  'required',
            'slug'                  =>  'required|unique:categories,slug,' . $id,
        ], [
            'name.required'                 =>  'Category Name is required',
            'description.required'          =>  'Category Description is required',
            'short_description.required'    =>  'Category Short Description is required',
            // 'alt.required'                  =>  'Category Image Alt text is required',
            'slug.required'                 =>  'Category Slug is required',
        ]);

        $featured_image = "";
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/', $file, $featured_image);
        }

        $og_image = "";
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/category/og_images', $file, $og_image);
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        Category::where('id', $id)->update([
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

        return redirect('admin/sub/sub/categories')->with('success', 'Sub Sub category updated successfully');
    }

    public function destroy_sub2($id)
    {
        DB::table('categories')->where('id', $id)->update(['flag' => 1]);
        return redirect('admin/sub/sub/categories')->with('danger', 'Category deleted successfully');
    }
}
