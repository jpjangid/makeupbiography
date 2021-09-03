<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $allusers = User::with('wallets')->get();

            $users = new Collection;
            foreach ($allusers as $user) {
                $credit = 0;
                $debit = 0;
                foreach($user->wallets as $wallet){
                    if($wallet->status == 'credited'){
                        $credit += $wallet->amount;
                    }
                    if($wallet->status == 'debited'){
                        $debit += $wallet->amount;
                    }
                }
                $users->push([
                    'id'        =>  $user->id,
                    'name'      =>  $user->name,
                    'email'     =>  $user->email,
                    'mobile'    =>  $user->mobile,
                    'role'      =>  $user->role,
                    'amount'    =>  number_format((float)$credit - $debit, 2, '.', ''),
                ]);
            }

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('wallet', function ($row) {
                    $wallet = '<a class="btn btn-sm ml-1" href="' . url('admin/wallets/edit', $row['id']) . '"><i style="color:blue" class="fas fa-wallet"></i></a>';
                    return $wallet;
                })
                ->addColumn('action', function ($row) {
                    $edit_url = url('admin/users/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','wallet'])
                ->make(true);
        }
        return view('backend.users.index');
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'role'          =>  'required',
            'mobile'        =>  'required',
            'email'         =>  'required',
            'password'      =>  'required',
        ],[
            'name.required'         =>  'Name is required',
            'role.required'         =>  'Role is required',
            'mobile.required'       =>  'Mobile No. is required',
            'email.required'        =>  'Email Address is required',
            'password.required'     =>  'Password is required',
        ]);

        
        $image = "";
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/users/', $file, $image);
        }

        $password = Hash::make($request->password);

        User::create([
            'name'          =>  $request->name,
            'email'         =>  $request->email,
            'mobile'        =>  $request->mobile,
            'role'          =>  $request->role,
            'password'      =>  $password,
            'image'         =>  $image,
        ]);

        return redirect('admin/users')->with('success','User Registered Successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          =>  'required',
            'role'          =>  'required',
            'mobile'        =>  'required',
            'email'         =>  'required',
        ],[
            'name.required'         =>  'Name is required',
            'role.required'         =>  'Role is required',
            'mobile.required'       =>  'Mobile No. is required',
            'email.required'        =>  'Email Address is required',
        ]);

        $user = User::find($id);
        
        $image = '';
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            $file = $request->file('image');
            $fileNameString = (string) Str::uuid();
            $image = $fileNameString . time() . "." . $extension;
            Storage::putFileAs('public/users/', $file, $image);
        }else{
            $image = $user->image;
        }

        if(!empty($request->password)){
            $password = Hash::make($request->password);
        }else{
            $password = $user->password;
        }

        $user->name           =   $request->name;
        $user->email          =   $request->email;
        $user->mobile         =   $request->mobile;
        $user->role           =   $request->role;
        $user->password       =   $password;
        $user->image          =   $image;
        $user->update();

        return redirect('admin/users')->with('success','User Updated Successfully');
    }

    public function destroy($id)
    {
        //
    }
}
