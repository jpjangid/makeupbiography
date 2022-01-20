<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $allcoupons = Coupon::where('flag', '0')->get();

            $coupons = new Collection;
            foreach ($allcoupons as $coupon) {
                $coupons->push([
                    'id'            =>  $coupon->id,
                    'name'          =>  $coupon->name,
                    'code'          =>  $coupon->code,
                    'type'          =>  $coupon->type,
                    'offer_start'   =>  date('d-m-Y H:i', strtotime($coupon->offer_start)),
                    'offer_end'     =>  date('d-m-Y H:i', strtotime($coupon->offer_end)),
                    'days'          =>  $coupon->days,
                    'created_at'    =>  date('d-m-Y H:i', strtotime($coupon->created_at)),
                    'show_in_front' =>  $coupon->show_in_front
                ]);
            }

            return Datatables::of($coupons)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['show_in_front'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid" style="padding-left: 3.75rem !important">
                                        <input type="hidden" value="' . $row['id'] . '" class="coupon_id">
                                        <input type="checkbox" class="form-check-input show_in_front  h-25px w-40px" value="' . $row['show_in_front'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/coupons/delete', $row['id']);
                    $edit_url = url('admin/coupons/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }

        return view('backend.coupons.index');
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $brands = Brand::where('flag', '0')->get();
        $products = Product::where('flag', '0')->get();
        $main_cats = Category::where(['flag' => '0', 'parent_id' => null])->get();
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

        return view('backend.coupons.create', compact(
            'main_cats',
            'cats',
            'sub_cats',
            'users',
            'brands',
            'products'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'code'          =>  'required',
            'type'          =>  'required',
        ], [
            'name.required'     =>  'Name is required',
            'code.required'     =>  'Coupon Code is required',
            'type.required'     =>  'Coupon Type is required',
        ]);

        $days = implode(",", $request->days);

        Coupon::create([
            'name'                  =>  $request->name,
            'code'                  =>  $request->code,
            'type'                  =>  $request->type,
            'min_order_amount'      =>  $request->min_order_amount,
            'max_order_amount'      =>  $request->max_order_amount,
            'offer_start'           =>  $request->offer_start,
            'offer_end'             =>  $request->offer_end,
            'coupon_limit'          =>  $request->coupon_limit,
            'times_applied'         =>  $request->times_applied,
            'disc_type'             =>  $request->disc_type,
            'discount'              =>  $request->discount,
            'show_in_front'         =>  $request->show_in_front,
            'brand_id'              =>  $request->brand_id,
            'main_cat_id'           =>  $request->main_cat_id,
            'cat_id'                =>  $request->cat_id,
            'sub_cat_id'            =>  $request->sub_cat_id,
            'product_id'            =>  $request->product_id,
            'user_id'               =>  $request->user_id,
            'days'                  =>  $days,
        ]);

        return redirect('admin/coupons')->with('success', 'Coupon Added Successfully');
    }

    public function show($id)
    {
        $coupon = Coupon::find($id);
        $users = User::where('role', 'user')->get();
        $brands = Brand::where('flag', '0')->get();
        $products = Product::where('flag', '0')->get();
        $main_cats = Category::where(['flag' => '0', 'parent_id' => null])->get();
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

        return view('backend.coupons.show', compact(
            'main_cats',
            'cats',
            'sub_cats',
            'users',
            'brands',
            'products',
            'coupon'
        ));
    }

    public function edit($id)
    {
        $coupon = Coupon::find($id);
        $users = User::where('role', 'user')->get();
        $brands = Brand::where('flag', '0')->get();
        $products = Product::where('flag', '0')->get();
        $main_cats = Category::where(['flag' => '0', 'parent_id' => null])->get();
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

        return view('backend.coupons.edit', compact(
            'main_cats',
            'cats',
            'sub_cats',
            'users',
            'brands',
            'products',
            'coupon'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          =>  'required',
            'code'          =>  'required',
            'type'          =>  'required',
        ], [
            'name.required'     =>  'Name is required',
            'code.required'     =>  'Coupon Code is required',
            'type.required'     =>  'Coupon Type is required',
        ]);

        $coupon = Coupon::find($id);

        $days = $coupon->days;
        if (!empty($request->days)) {
            $days = implode(",", $request->days);
        }

        $coupon->name                   =  $request->name;
        $coupon->code                   =  $request->code;
        $coupon->type                   =  $request->type;
        $coupon->min_order_amount       =  $request->min_order_amount;
        $coupon->max_order_amount       =  $request->max_order_amount;
        $coupon->offer_start            =  $request->offer_start;
        $coupon->offer_end              =  $request->offer_end;
        $coupon->coupon_limit           =  $request->coupon_limit;
        $coupon->times_applied          =  $request->times_applied;
        $coupon->disc_type              =  $request->disc_type;
        $coupon->discount               =  $request->discount;
        $coupon->show_in_front          =  $request->show_in_front;
        $coupon->brand_id               =  $request->brand_id;
        $coupon->main_cat_id            =  $request->main_cat_id;
        $coupon->cat_id                 =  $request->cat_id;
        $coupon->sub_cat_id             =  $request->sub_cat_id;
        $coupon->product_id             =  $request->product_id;
        $coupon->user_id                =  $request->user_id;
        $coupon->days                   =  $days;
        $coupon->update();

        return redirect('admin/coupons')->with('success', 'Coupon Updated Successfully');
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->flag = '1';
        $coupon->update();

        return redirect('admin/coupons')->with('success', 'Coupon Deleted Successfully');
    }

    public function update_status(Request $request)
    {
        $coupon = Coupon::find($request->coupon_id);
        $coupon->show_in_front   = $request->show_in_front == 1 ? 0 : 1;
        $coupon->update();

        return response()->json(['message' => 'Coupon status updated successfully.']);
    }
}
