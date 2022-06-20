<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Brand;
use App\Models\DiscountDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.discount.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b_exclusion = implode(",", $request->brand_exclusion);
        $pexclusion = implode(",", $request->products_exclusion);
        $dis = Discount::create([
            'discount_on'           => $request->discount_on,
            'entity_id'             => $request->entity_id,
            'discount_type'         => 'percentage',
            'discount'              => $request->discount,
            'brand_exclusion'       => $b_exclusion,
            'products_exclusion'    => $pexclusion,
            'start_date'            => $request->start_date,
            'end_date'              => $request->end_date,
        ]);

        foreach ($request->brand_exclusion as $brand_ex) {
            $brands = Brand::select('id')->where('id', $brand_ex)->get()->toArray();
            $brand_ex = array_column($brands, 'id');
            $products = DB::table('products')->select('id')->whereIn('brand_id', $brand_ex)->get();
            foreach ($products as $product) {
                $dis_details = DiscountDetails::where(['product_id' => $product->id])->first();
                if (!empty($dis_details)) {
                    $dis_details->discount_id = $dis->id;
                    $dis_details->product_id = $product->id;
                    $dis_details->discount_type = 'percentage';
                    $dis_details->discount = $dis->discount;
                    $dis_details->update();
                } else {
                    DiscountDetails::create([
                        'discount_id'       => $dis->id,
                        'product_id'        => $product->id,
                        'discount_type'     => 'percentage',
                        'discount'          => $dis->discount,
                    ]);
                }
            }
        }
        return redirect()->back()->with('success', 'Discount Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
    }
    public function discounton(Request $request)
    {
        if ($request->id == 1) {
            $cat = DB::table('brands')->where(['top_brand_status' => '1', 'status' => '1'])->get();
            return response()->json(['cat' => $cat, 'discounton' => 'brand']);
        } elseif ($request->id == 2) {
            $cat = DB::table('categories')->where('status', '0')->get();
            $brand = DB::table('brands')->where(['top_brand_status' => '1', 'status' => '1'])->get();
            $product = DB::table('products')->where(['ecom' => 'ONLINE', 'status' => '0'])->get();
            return response()->json(['cat' => $cat, 'brand' => $brand, 'product' => $product, 'discounton' => 'category']);
        } elseif ($request->id == 3) {
            $cat = DB::table('products')->where(['ecom' => 'ONLINE', 'status' => '0'])->get();
            return response()->json(['cat' => $cat, 'discounton' => 'product']);
        }
    }
}
