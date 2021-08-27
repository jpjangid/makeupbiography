<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Redirection;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use DataTables;
use Illuminate\Support\Collection;

class RedirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $redirections1 = Redirection::get();

            $redirections = new Collection;
            foreach($redirections1 as $redirection) {
                $redirections->push([
                    'id'    => $redirection->id,
                    'from_url'  => $redirection->from_url,
                    'to_url'  => $redirection->to_url,
                ]);    
            }

            return Datatables::of($redirections)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                           $delete_url = url('admin/redirections/delete',$row['id']);
                           $btn = '<a class="btn btn-info btn-sm ml-1" href="'.$delete_url.'"><i class="fa fa-trash"></i></a>'; 
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.redirections.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.redirections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'from'                  =>  'required|unique:redirections,from_url',
            'to'                    =>  'required',
        ], [
            'from.required'                 =>  'From Url is required',
            'from.unique'                   =>  'From Url already exist',
            'to.required'                   =>  'To Url is required',
        ]);

        Redirection::create([
            'from_url' => $request->from,
            'to_url'   => $request->to 
        ]);

        return redirect('admin/redirections')->with('success','Redirection created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function show(Redirection $redirection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function edit(Redirection $redirection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redirection $redirection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Redirection  $redirection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Redirection::where('id',$id)->delete();
        return redirect('admin/redirections')->with('danger','Redirection deleted successfully');
    }
}
