<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $allusers = User::where('flag', '0')->get();

            $users = new Collection;
            foreach ($allusers as $user) {
                $users->push([
                    'id'    => $user->id,
                    'name'  => $user->name,
                    'email'  => $user->email,
                    'mobile' => $user->mobile,
                ]);
            }

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit_url = url('admin/users/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.users.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
