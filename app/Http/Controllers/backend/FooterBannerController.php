<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\FooterBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Collection;

class FooterBannerController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $footers1 = FooterBanner::where(['status' => 1])->get();

            $footers = new Collection;
            foreach ($footers1 as $footer) {
                $footers->push([
                    'id'    => $footer->id,
                    'name'  => $footer->name,
                    'url'   => $footer->url,
                    'status' => $footer->status
                ]);
            }

            return Datatables::of($footers)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="footer_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/footer/banners/delete', $row['id']);
                    $edit_url = url('admin/footer/banners/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
        return view('backend.footer_banner.index');
    }

    public function update_status(Request $request)
    {
        $footer = FooterBanner::find($request->brand_id);
        $footer->status   = $request->status == 1 ? 0 : 1;
        $footer->update();

        return response()->json(['message' => 'Footer Banner status updated successfully.']);
    }

    public function edit($id)
    {
        $footer = FooterBanner::where('id', $id)->first();
        return view('backend.footer_banner.edit', compact('footer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'url'                   =>  'required',
            'image'                 =>  'required',
            'alt'                   =>  'required',
        ], [
            'url.required'                  =>  'Url is required',
            'image.required'                =>  'Image is required',
            'image.mimes'                   =>  'Image must be type of image',
            'alt.required'                  =>  'Image Alt text is required',
        ]);

        $footer = FooterBanner::find($id);
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/footer_images/', $file, $image);
            $footer->image = $image;
        }

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        $footer->url                     =  $request->url;
        $footer->alt                     =  $request->alt;
        $footer->status                  =  $status;
        $footer->update();

        return redirect('admin/footer/banners')->with('success', 'Footer Banner Updated Successfully');
    }

    public function destroy($id)
    {
        $footer = FooterBanner::find($id);
        $footer->flag   =   '1';
        $footer->update();

        return redirect('admin/footer/banners')->with('danger', 'Footer Banner Deleted');
    }
}
