<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\Label;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            // $allproducts = Product::where(['flag' => '0', 'ecom' => 'ONLINE'])->get();
            $allproducts = DB::table('products')->select('id','item_shade_name','slug','status')->where(['flag' => '0', 'ecom' => 'ONLINE'])->get();

            $products = new Collection;
            foreach ($allproducts as $product) {
                $products->push([
                    'id'        => $product->id,
                    'name'      => $product->item_shade_name,
                    'slug'      => $product->slug,
                    'status'    => $product->status
                ]);
            }

            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="product_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/products/delete', $row['id']);
                    $edit_url = url('admin/products/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }

        return view('backend.products.index');
    }

    public function create()
    {
        $main_cats = Category::where(['flag' => '0', 'parent_id' => null])->get();
        $brands = Brand::where(['status' => 1, 'flag' => 0])->get();
        $labels = Label::where(['flag' => 0, 'status' => 1])->get();

        return view('backend.products.create', compact('main_cats', 'labels', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name'             =>  'required',
            'item_shade_name'       =>  'required',
            'slug'                  =>  'required',
            'short_description'     =>  'required',
            'description'           =>  'required',
            'brand'                 =>  'required',
            'sku'                   =>  'required',
            'sequence'              =>  'required',
            'regular_price'         =>  'required',
            'sale_price'            =>  'required',
            'main_cat'              =>  'required',
        ], [
            'item_name.required'            =>  'Please Enter Product Name',
            'item_shade_name.required'      =>  'Please Enter Product Variant Name',
            'slug.required'                 =>  'Please Enter Slug',
            'short_description.required'    =>  'Please Enter Short Description',
            'description.required'          =>  'Please Enter Description',
            'brand.required'                =>  'Please Select Brand',
            'sku.required'                  =>  'Please Enter SKU',
            'sequence.required'             =>  'Please Enter Sequence',
            'regular_price.required'        =>  'Please Enter Regular Price',
            'sale_price.required'           =>  'Please Enter Sale Price',
            'main_cat.required'             =>  'Please Select Main Category',
        ]);

        $category_id = '';
        if (!empty($request->sub_cat)) {
            $category_id = $request->sub_cat;
        } elseif (!empty($request->cat)) {
            $category_id = $request->cat;
        } else {
            $category_id = $request->main_cat;
        }

        $og_image = '';
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/products/og_images', $file, $og_image);
        }

        $tags = "";
        if (!empty($request->tags)) {
            $tags = implode(',', $request->tags);
        }

        $video_data = array();
        $image_data = array();
        foreach ($request->media_type as $key => $media_type) {
            if (!empty($media_type)) {
                if ($media_type == 'video') {
                    $video['media_type'] = $media_type;
                    $video['media_alt'] = $request->media_alt[$key];
                    $video['sequence']  = $request->sequence[$key];

                    array_push($video_data, $video);
                }
                if ($media_type == 'image') {
                    $image['media_type'] = $media_type;
                    $image['media_alt'] = $request->media_alt[$key];
                    $image['sequence']  = $request->sequence[$key];

                    array_push($image_data, $image);
                }
            }
        }

        if (!empty($request->media1)) {
            foreach ($request->media1 as $key => $video) {
                if (!empty($video)) {
                    $video_data[$key]['media'] = $video;
                }
            }
        }

        if (!empty($request->media)) {
            foreach ($request->media as $key => $image) {
                $media = "";
                if (!empty($image)) {
                    $extension = $image->extension();
                    $file = $image;
                    $fileNameString = (string) Str::uuid();
                    $media = $fileNameString . time() . "." . $extension;
                    $image_data[$key]['media'] = $media;
                    Storage::putFileAs('public/products/variants/', $file, $media);
                }
            }
        }

        $final_media = array_merge($image_data, $video_data);

        $product = Product::create([
            'item_name'             =>  $request->item_name,
            'item_shade_name'       =>  $request->item_shade_name,
            'slug'                  =>  $request->slug,
            'parent_id'             =>  $category_id,
            'brand_id'              =>  $request->brand,
            'short_description'     =>  $request->short_description,
            'description'           =>  $request->description,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_description'        =>  $request->og_description,
            'tags'                  =>  $tags,
            'status'                =>  $request->status,
            'og_image'              =>  $og_image,
            'label_name'            =>  $request->label_name,
            'sku'                   =>  $request->sku,
            'hex_code'              =>  $request->hex_code,
            'p_type'                =>  $request->p_type,
            'variation'             =>  $request->variation,
            'sequence'              =>  $request->main_sequence,
            'discount_type'         =>  $request->discount_type,
            'discount'              =>  $request->discount,
            'regular_price'         =>  $request->regular_price,
            'sale_price'            =>  $request->sale_price,
        ]);

        foreach ($final_media as $media) {
            if (isset($media['media']) && !empty($media['media'])) {
                ProductMedia::create([
                    'product_id'            =>  $product->id,
                    'media'                 =>  $media['media'],
                    'media_alt'             =>  $media['media_alt'],
                    'media_type'            =>  $media['media_type'],
                    'sequence'              =>  $media['sequence'],
                ]);
            }
        }

        return redirect('admin/products/variants/' . $product->id);
    }

    public function update_status(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->status   = $request->status == 1 ? 0 : 1;
        $product->update();

        return response()->json(['message' => 'Blog status updated successfully.']);
    }

    public function edit($id)
    {
        $main_cats = Category::where(['flag' => '0', 'parent_id' => null])->get();
        $brands = Brand::where(['status' => 1, 'flag' => 0])->get();
        $labels = Label::where(['status' => 1, 'flag' => 0])->get();

        $product = Product::find($id);
        $cat = Category::find($product->parent_id);
        $cat1 = '';
        $cat2 = '';
        $cat3 = '';
        if ($cat->parent_id == '' || $cat->parent_id == NULL) {
            $cat1 = $cat->id;
        } else {
            $other_cat = Category::find($cat->parent_id);
            if ($other_cat->parent_id == '' || $other_cat->parent_id == NULL) {
                $cat1 = $other_cat->id;
                $cat2 = $cat->id;
            } else {
                $cat3 = $cat->id;
                $cat2 = $other_cat->id;
                $cat1 = $other_cat->parent_id;
            }
        }

        $medias = ProductMedia::where('product_id', $id)->get();

        return view('backend.products.edit', compact('main_cats', 'product', 'labels', 'brands', 'cat1', 'cat2', 'cat3', 'medias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name'             =>  'required',
            'item_shade_name'       =>  'required',
            'slug'                  =>  'required',
            'short_description'     =>  'required',
            'description'           =>  'required',
            'brand'                 =>  'required',
            'sku'                   =>  'required',
            'sequence'              =>  'required',
            'regular_price'         =>  'required',
            'sale_price'            =>  'required',
            'main_cat'              =>  'required',
        ], [
            'item_name.required'            =>  'Please Enter Product Name',
            'item_shade_name.required'      =>  'Please Enter Product Variant Name',
            'slug.required'                 =>  'Please Enter Slug',
            'short_description.required'    =>  'Please Enter Short Description',
            'description.required'          =>  'Please Enter Description',
            'brand.required'                =>  'Please Select Brand',
            'sku.required'                  =>  'Please Enter SKU',
            'sequence.required'             =>  'Please Enter Sequence',
            'regular_price.required'        =>  'Please Enter Regular Price',
            'sale_price.required'           =>  'Please Enter Sale Price',
            'main_cat.required'             =>  'Please Select Main Category',
        ]);

        $status = isset($request->status) ? '1' : '0';

        $product = Product::find($id);

        $category_id = '';
        if (!empty($request->sub_cat)) {
            $category_id = $request->sub_cat;
        } elseif (!empty($request->cat)) {
            $category_id = $request->cat;
        } elseif (!empty($request->main_cat)) {
            $category_id = $request->main_cat;
        } else {
            $category_id = $product->parent_id;
        }

        $og_image = $product->og_image;
        if ($request->hasFile('og_image')) {
            $extension = $request->file('og_image')->extension();
            $file = $request->file('og_image');
            $fileNameString = (string) Str::uuid();
            $og_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/products/og_images', $file, $og_image);
        }

        $tags = "";
        if (!empty($request->tags)) {
            $tags = implode(',', $request->tags);
        }

        $video_data = array();
        $image_data = array();
        foreach ($request->media_type as $key => $media_type) {
            if (!empty($media_type)) {
                if ($media_type == 'video') {
                    $video['media_type'] = $media_type;
                    $video['media_alt'] = $request->media_alt[$key];
                    $video['sequence']  = $request->sequence[$key];

                    array_push($video_data, $video);
                }
                if ($media_type == 'image') {
                    $image['media_type'] = $media_type;
                    $image['media_alt'] = $request->media_alt[$key];
                    $image['sequence']  = $request->sequence[$key];

                    array_push($image_data, $image);
                }
            }
        }

        if (!empty($request->media1)) {
            foreach ($request->media1 as $key => $video) {
                if (!empty($video)) {
                    $video_data[$key]['media'] = $video;
                }
            }
        }

        if (!empty($request->media)) {
            foreach ($request->media as $key => $image) {
                $media = "";
                if (!empty($image)) {
                    $extension = $image->extension();
                    $file = $image;
                    $fileNameString = (string) Str::uuid();
                    $media = $fileNameString . time() . "." . $extension;
                    $image_data[$key]['media'] = $media;
                    Storage::putFileAs('public/products/variants/', $file, $media);
                }
            }
        }

        $final_media = array_merge($image_data, $video_data);

        $product->item_name             =  $request->item_name;
        $product->item_shade_name       =  $request->item_shade_name;
        $product->slug                  =  $request->slug;
        $product->short_description     =  $request->short_description;
        $product->description           =  $request->description;
        $product->brand_id              =  $request->brand;
        $product->alt                   =  $request->alt;
        $product->meta_title            =  $request->meta_title;
        $product->meta_keyword          =  $request->meta_keyword;
        $product->meta_description      =  $request->meta_description;
        $product->og_title              =  $request->og_title;
        $product->og_description        =  $request->og_description;
        $product->tags                  =  $tags;
        $product->status                =  $status;
        $product->parent_id             =  $category_id;
        $product->og_image              =  $og_image;
        $product->label_name            =  $request->label_name;
        $product->sku                   =  $request->sku;
        $product->hex_code              =  $request->hex_code;
        $product->p_type                =  $request->p_type;
        $product->variation             =  $request->variation;
        $product->sequence              =  $request->main_sequence;
        $product->discount_type         =  $request->discount_type;
        $product->discount              =  $request->discount;
        $product->regular_price         =  $request->regular_price;
        $product->sale_price            =  $request->sale_price;
        $product->update();

        foreach ($final_media as $media) {
            if (isset($media['media']) && !empty($media['media'])) {
                ProductMedia::create([
                    'product_id'            =>  $product->id,
                    'media'                 =>  $media['media'],
                    'media_alt'             =>  $media['media_alt'],
                    'media_type'            =>  $media['media_type'],
                    'sequence'              =>  $media['sequence'],
                ]);
            }
        }

        return redirect('admin/products/variants/' . $id);
    }

    public function cat(Request $request)
    {
        $cat = Category::where('parent_id', $request->id)->get();
        return $cat;
    }

    public function mediadelete($id)
    {
        $media = ProductMedia::find($id);
        $media->delete();

        return redirect()->back()->with('danger', 'Media Deleted !');
    }
}
