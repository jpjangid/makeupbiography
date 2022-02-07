<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ContactUsController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $contacts1 = DB::table('contact_us')->where('flag', '0')->get();

            $contacts = new Collection;
            foreach ($contacts1 as $contact) {
                $contacts->push([
                    'id'    => $contact->id,
                    'name'  => $contact->name,
                    'email'  => $contact->email,
                    'mobile' => $contact->mobile,
                    'message' => $contact->message
                ]);
            }

            return Datatables::of($contacts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $delete_url = url('admin/contact_us/delete', $row['id']);
                    $edit_url = url('admin/contact_us/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    $btn .= '<a class="btn btn-info btn-sm ml-1" href="' . $delete_url . '"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.contact_us.index');
    }

    public function create()
    {
        return view('backend.contact_us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
            'mobile'    =>  'required|numeric|digits:10',
            'message'   =>  'required',
        ], [
            'name.required'     =>  'Please Enter Name',
            'email.required'    =>  'Please Enter Email',
            'mobile.required'   =>  'Please Enter Mobile',
            'message.required'  =>  'Please Enter Message',
            'mobile.numeric'    =>  'Please Enter Mobile No. in numbers',
        ]);

        ContactUs::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'mobile'    =>  $request->mobile,
            'message'   =>  $request->message,
        ]);

        return redirect('admin/contact_us')->with('success', 'Contact Added Successfully');
    }

    public function edit($id)
    {
        $contact = ContactUs::find($id);

        return view('backend.contact_us.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email',
            'mobile'    =>  'required|numeric|digits:10',
            'message'   =>  'required',
        ], [
            'name.required'     =>  'Please Enter Name',
            'email.required'    =>  'Please Enter Email',
            'mobile.required'   =>  'Please Enter Mobile',
            'message.required'  =>  'Please Enter Message',
            'mobile.numeric'    =>  'Please Enter Mobile No. in numbers',
        ]);

        $contact = ContactUs::find($id);
        $contact->name      =  $request->name;
        $contact->email     =  $request->email;
        $contact->mobile    =  $request->mobile;
        $contact->message   =  $request->message;
        $contact->update();

        return redirect('admin/contact_us')->with('success', 'Contact Updated Successfully');
    }

    public function destroy($id)
    {
        $contact = ContactUs::find($id);
        $contact->flag = '1';
        $contact->update();

        return redirect('admin/contact_us')->with('danger', 'Contact Deleted Successfully');
    }
}
