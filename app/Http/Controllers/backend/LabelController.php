<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LabelController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $labels1 = DB::table('labels')->where(['flag' => 0])->get();

            $labels = new Collection;
            foreach ($labels1 as $label) {
                $labels->push([
                    'id'    => $label->id,
                    'name'  => $label->name,
                    'status' => $label->status
                ]);
            }

            return Datatables::of($labels)
                ->addIndexColumn()
                ->addColumn('active', function ($row) {
                    $checked = $row['status'] == '1' ? 'checked' : '';
                    $active  = '<div class="form-check form-switch form-check-custom form-check-solid">
                                        <input type="hidden" value="' . $row['id'] . '" class="labels_id">
                                        <input type="checkbox" class="form-check-input js-switch  h-20px w-30px" id="customSwitch1" name="status" value="' . $row['status'] . '" ' . $checked . '>
                                    </div>';

                    return $active;
                })
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/labels/delete', $row['id']);
                    $edit_url = url('admin/labels/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }
        return view('backend.labels.index');
    }

    public function create()
    {
        return view('backend.labels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                      =>  'required|unique:labels,name',
        ], [
            'name.required'             =>  'Label Name is required',
            'name.unique'               =>  'Label Name must be unique',
        ]);

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        Label::create([
            'name'      =>  $request->name,
            'status'    =>  $status,
        ]);

        return redirect('admin/labels')->with('success', 'Label Created Successfully');
    }

    public function update_status(Request $request)
    {
        $label              = Label::find($request->label_id);
        $label->status      = $request->status == 1 ? 0 : 1;
        $label->update();

        return response()->json(['message' => 'Label status updated successfully.']);
    }

    public function edit($id)
    {
        $label = DB::table('labels')->where('id', $id)->first();
        return view('backend.labels.edit', compact('label'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                      =>  'required|unique:labels,name,' . $id,
        ], [
            'name.required'             =>  'Label Name is required',
            'name.unique'               =>  'Label Name must be unique',
        ]);

        $label = Label::find($id);

        $status = 0;
        if (isset($request->status)) {
            $status = 1;
        }

        $label->name                     =  $request->name;
        $label->status                   =  $status;
        $label->update();

        return redirect('admin/labels')->with('success', 'Label Updated Successfully');
    }

    public function destroy($id)
    {
        $brand              = Label::find($id);
        $brand->flag        =   '1';
        $brand->update();

        return redirect('admin/labels')->with('danger', 'Label Deleted');
    }
}
