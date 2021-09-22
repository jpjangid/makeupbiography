<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\RelatedProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\DataTables;

class RelatedProductController extends Controller
{
    public function index()
    {
        $related = RelatedProducts::select('main_id')->with('main:id,name')->groupby('main_id')->get();
        
        if (request()->ajax()) {
            $related_products = new Collection;
            foreach ($related as $relate) {
                $related_products->push([
                    'id'    => $relate->main->id,
                    'name'  => $relate->main->name,
                ]);
            }

            return Datatables::of($related_products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit_url = url('admin/related_products/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.related_products.index');
    }

    public function create()
    {
        $products = Product::all();

        return view('backend.related_products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_id'                 =>  'required',
        ], [
            'main_id.required'                =>  'Please Select Product',
        ]);

        if(!empty($request->related_products)){
            foreach($request->related_products as $key => $product){
                RelatedProducts::create([
                    'main_id'       =>  $request->main_id,
                    'related_id'    =>  $product,
                    'sequence'      =>  isset($request->sequence[$key]) ? $request->sequence[$key] : 0,
                ]);
            }
        }

        return redirect('admin/related_products')->with('success','Related Products Added');
    }

    public function edit($id)
    {
        $main_product = RelatedProducts::where('main_id',$id)->with('main')->first();
        $products = Product::all();
        $related_products = RelatedProducts::where(['main_id' => $id, 'flag' => '0'])->get();

        return view('backend.related_products.edit', compact('main_product','products','related_products'));
    }

    public function update(Request $request, $id)
    {
        $related = RelatedProducts::find($id);
        $related->related_id = $request->related_id;
        $related->sequence = $request->sequence;
        $related->update();

        return redirect()->back()->with('success','Updated Successfully');
    }

    public function destroy($id)
    {
        $related = RelatedProducts::find($id);
        $related->flag = 1;
        $related->update();
        
        return redirect()->back()->with('danger','Deleted Successfully');
    }
}
