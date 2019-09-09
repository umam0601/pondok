<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use DataTables;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        return view('admin.dashboard');
    }

    public function pondok()
    {
        return view('admin.pondok.index');
    }

    public function kitab()
    {
        return view('admin.kitab.index');
    }

    // Review Pondok Peantren
    public function user()
    {
        return view('admin.user.index');
    }

    public function get_user()
    {
        $datas = DB::table('users')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('role', function($datas){
                if ($datas->role_admin == '1') {
                    return 'Admin';
                }else{
                    return 'User';
                }
            })
            ->addColumn('status', function($datas){
                if ($datas->status == '1') {
                    return 'Online';
                }else{
                    return 'Offline';
                }
            })
            ->addColumn('action', function ($datas) {
                return '<div class="btn-group">
                            <button class="btn btn-sm btn-info hint--top" aria-label="Detail" onclick="detail(\''.Crypt::encrypt($datas->id).'\')"><i class="fa fa-fw fa-folder-open"></i></button>
                            <button class="btn btn-sm btn-warning hint--top" aria-label="Edit" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->id).'\')"><i class="fa fa-fw fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger hint--top" aria-label="Hapus" onclick="hapus(\''.Crypt::encrypt($datas->id).'\')"><i class="fa fa-fw fa-trash"></i></button>
                        </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Review Pondok Peantren
    public function review()
    {
        return view('admin.review.index');
    }

    public function get_review()
    {
        $datas = DB::table('m_review')
            ->select('m_review.*', 'users.name as username', 'p_name')
            ->join('m_pondok', 'p_id', 'r_pondok')
            ->join('users', 'id', 'r_user')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('action', function ($datas) {
                return '<div class="btn-group">
                            <button class="btn btn-sm btn-info hint--top" aria-label="Detail" onclick="detail(\''.Crypt::encrypt($datas->r_id).'\')"><i class="fa fa-fw fa-folder-open"></i></button>
                            <button class="btn btn-sm btn-warning hint--top" aria-label="Edit" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->r_id).'\')"><i class="fa fa-fw fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger hint--top" aria-label="Hapus" onclick="hapus(\''.Crypt::encrypt($datas->r_id).'\')"><i class="fa fa-fw fa-trash"></i></button>
                        </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
