<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Models\Label;

class ProductController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $allproducts = Product::where('flag', '0')->get();

            $products = new Collection;
            foreach ($allproducts as $product) {
                $products->push([
                    'id'        => $product->id,
                    'name'      => $product->name,
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
        $brands = Brand::where(['status' => 1,'flag' => 0])->get();
        $labels = Label::where(['flag' => 0,'status' => 1])->get();
        $cats = new Collection;
        $sub_cats = new Collection;
        foreach ($main_cats as $cat) {
            $subs = Category::where(['parent_id' => $cat->id, 'flag' => 0])->get();
            if ($subs->isNotEmpty()) {
                foreach ($subs as $sub) {
                    $cats->push([
                        'id'    => $sub->id,
                        'name'  => $sub->name,
                    ]);
                    $sub_subs = Category::where(['parent_id' => $sub->id, 'flag' => 0])->get();
                    if ($sub_subs->isNotEmpty()) {
                        foreach ($sub_subs as $sub_sub) {
                            $sub_cats->push([
                                'id'    => $sub_sub->id,
                                'name'  => $sub_sub->name,
                            ]);
                        }
                    }
                }
            }
        }

        return view('backend.products.create', compact('main_cats', 'cats', 'sub_cats', 'labels','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  =>  'required',
            'slug'                  =>  'required',
            'short_description'     =>  'required',
            'description'           =>  'required',
            'brand'                 =>  'required',
        ], [
            'name.required'                 =>  'Name is Required',
            'slug.required'                 =>  'Slug is Required',
            'short_description.required'    =>  'Short Description is Required',
            'description.required'          =>  'Description is Required',
            'brand.required'                =>  'Brand is required',
        ]);

        $category_id = '';
        if (!empty($request->sub_cat)) {
            $category_id = $request->sub_cat;
        } elseif (!empty($request->cat)) {
            $category_id = $request->cat;
        } else {
            $category_id = $request->main_cat;
        }

        $featured_image = '';
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/products/', $file, $featured_image);
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
        if(!empty($request->tags)) {
            $tags = implode(',', $request->tags);
        }

        $product = Product::create([
            'name'                  =>  $request->name,
            'slug'                  =>  $request->slug,
            'parent_id'             =>  $category_id,
            'brand_id'              =>  $request->brand,
            'short_description'     =>  $request->short_description,
            'description'           =>  $request->description,
            'alt'                   =>  $request->alt,
            'meta_title'            =>  $request->meta_title,
            'meta_keyword'          =>  $request->meta_keyword,
            'meta_description'      =>  $request->meta_description,
            'og_title'              =>  $request->og_title,
            'og_description'        =>  $request->og_description,
            'tags'                  =>  $tags,
            'status'                =>  $request->status,
            'main_image'            =>  $featured_image,
            'og_image'              =>  $og_image,
            'label_name'            =>  $request->label_name,
        ]);

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
        $brands = Brand::where(['status' => 1,'flag' => 0])->get();
        $labels = Label::where(['flag' => 0,'status' => 1])->get();
        $cats = new Collection;
        $sub_cats = new Collection;
        foreach ($main_cats as $cat) {
            $subs = Category::where(['parent_id' => $cat->id, 'flag' => 0])->get();
            if ($subs->isNotEmpty()) {
                foreach ($subs as $sub) {
                    $cats->push([
                        'id'    => $sub->id,
                        'name'  => $sub->name,
                    ]);
                    $sub_subs = Category::where(['parent_id' => $sub->id, 'flag' => 0])->get();
                    if ($sub_subs->isNotEmpty()) {
                        foreach ($sub_subs as $sub_sub) {
                            $sub_cats->push([
                                'id'    => $sub_sub->id,
                                'name'  => $sub_sub->name,
                            ]);
                        }
                    }
                }
            }
        }

        $product = Product::find($id);

        return view('backend.products.edit', compact('main_cats', 'cats', 'sub_cats', 'product','labels','brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  =>  'required',
            'slug'                  =>  'required',
            'short_description'     =>  'required',
            'description'           =>  'required',
        ], [
            'name.required'                 =>  'Name is Required',
            'slug.required'                 =>  'Slug is Required',
            'short_description.required'    =>  'Short Description is Required',
            'description.required'          =>  'Description is Required',
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

        $featured_image = $product->main_image;
        if ($request->hasFile('featured_image')) {
            $extension = $request->file('featured_image')->extension();
            $file = $request->file('featured_image');
            $fileNameString = (string) Str::uuid();
            $featured_image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/products/', $file, $featured_image);
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
        if(!empty($request->tags)) {
            $tags = implode(',', $request->tags);
        }

        $product->name                  =  $request->name;
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
        $product->main_image            =  $featured_image;
        $product->og_image              =  $og_image;
        $product->label_name            =  $request->label_name;
        $product->update();

        return redirect('admin/products/variants/' . $id);
    }

    public function destroy($id)
    {
        //
    }

    public function variants($id)
    {
        $variants = ProductVariant::where('product_id', $id)->get();

        return view('backend.products.variants', compact('variants', 'id'));
    }

    public function store_variants(Request $request)
    {
        $request->validate([
            'name'              =>  'required',
            'sku'               =>  'required',
            'sequence'          =>  'required',
            'regular_price'     =>  'required',
            'sale_price'        =>  'required',
        ], [
            'name.required'             =>  'Variant Name is Required',
            'sku.required'              =>  'SKU is Required',
            'sequence.required'         =>  'Sequence is Required',
            'regular_price.required'    =>  'Regular Price is Required',
            'sale_price.required'       =>  'Sale Price is Required',
        ]);

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

        $variant = ProductVariant::create([
            'product_id'        =>  $request->product_id,
            'name'              =>  $request->name,
            'sku'               =>  $request->sku,
            'slug'              =>  $request->slug,
            'hex_code'          =>  $request->hex_code,
            'p_type'            =>  $request->p_type,
            'variation'         =>  $request->variation,
            'sequence'          =>  $request->main_sequence,
            'discount_type'     =>  $request->discount_type,
            'discount'          =>  $request->discount,
            'regular_price'     =>  $request->regular_price,
            'sale_price'        =>  $request->sale_price,
        ]);

        foreach ($final_media as $media) {
            if (isset($media['media']) && !empty($media['media'])) {
                ProductVariantMedia::create([
                    'product_variant_id'    =>  $variant->id,
                    'media'                 =>  $media['media'],
                    'media_alt'             =>  $media['media_alt'],
                    'media_type'            =>  $media['media_type'],
                    'sequence'              =>  $media['sequence'],
                ]);
            }
        }

        if ($request->submit == 'more') {
            return redirect()->back()->with('success', 'Product Variant Added Successfully');
        } else {
            return redirect('admin/products')->with('success', 'Product Added Successfully');
        }
    }

    public function edit_variant($id)
    {
        $variant = ProductVariant::where('id', $id)->with('medias')->first();

        return view('backend.products.edit_variant', compact('variant', 'id'));
    }

    public function update_variant(Request $request, $id)
    {
        $request->validate([
            'name'              =>  'required',
            'sku'               =>  'required',
            'sequence'          =>  'required',
            'regular_price'     =>  'required',
            'sale_price'        =>  'required',
        ], [
            'name.required'             =>  'Variant Name is Required',
            'sku.required'              =>  'SKU is Required',
            'sequence.required'         =>  'Sequence is Required',
            'regular_price.required'    =>  'Regular Price is Required',
            'sale_price.required'       =>  'Sale Price is Required',
        ]);

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

        $variant = ProductVariant::find($id);
        $variant->product_id        =  $request->product_id;
        $variant->name              =  $request->name;
        $variant->sku               =  $request->sku;
        $variant->slug              =  $request->slug;
        $variant->hex_code          =  $request->hex_code;
        $variant->p_type            =  $request->p_type;
        $variant->variation         =  $request->variation;
        $variant->sequence          =  $request->main_sequence;
        $variant->discount_type     =  $request->discount_type;
        $variant->discount          =  $request->discount;
        $variant->regular_price     =  $request->regular_price;
        $variant->sale_price        =  $request->sale_price;

        foreach ($final_media as $media) {
            if (isset($media['media']) && !empty($media['media'])) {
                ProductVariantMedia::create([
                    'product_variant_id'    =>  $variant->id,
                    'media'                 =>  $media['media'],
                    'media_alt'             =>  $media['media_alt'],
                    'media_type'            =>  $media['media_type'],
                    'sequence'              =>  $media['sequence'],
                ]);
            }
        }

        return redirect('admin/products/variants/' . $variant->product_id)->with('success', 'Product Variant Updated Successfully');
    }
}
