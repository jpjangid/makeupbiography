<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Yajra\DataTables\Facades\DataTables;

class WalletController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $allusers = User::where('role','user')->with('wallets')->get();
            $users = new Collection();
            foreach($allusers as $user){
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
                    'amount'    =>  $credit - $debit,
                ]);
            }

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit_url = url('admin/wallets/edit', $row['id']);
                    $btn = '<a class="btn btn-primary btn-sm ml-1" href="' . $edit_url . '"><i class="fas fa-edit"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.wallets.index');
    }

    public function edit($id)
    {
        $wallets = Wallet::where('user_id', $id)->orderby('created_at','desc')->get();

        return view('backend.wallets.edit', compact('wallets','id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount'    =>  'required|numeric',
        ],[
            'amount.required'   =>  'Please Enter Amount',
            'amount.numeric'    =>  'Please Enter Amount in Number',
        ]);

        Wallet::create([
            'user_id'       =>  $request->user_id,
            'amount'        =>  $request->amount,
            'remark'        =>  $request->remark,
            'status'        =>  'credited',
        ]);

        return redirect()->back()->with('success','Amount Added Successfully');
    }

    public function destroy($id)
    {
        //
    }
}
