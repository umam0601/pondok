<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use DB;
use Auth;
use File;
use Image;
use DataTables;
use CodeGenerator;

use App\m_prov;
use App\m_kota;
use App\m_camat;

class AdminPondokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_pondok()
    {
        $datas = DB::table('d_pondok')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('action', function ($datas) {
                return '<div class="btn-group">
                            <button class="btn btn-sm btn-primary" id="tooltip" data-toggle="tooltip" data-placement="top" title="Detail" onclick="detail(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-folder"></i></button>
                            <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Galeri" onclick="galeri(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-image"></i></button>
                            <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-trash"></i></button>
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
    public function add_pondok()
    {
        $prov = m_prov::all();
        return view('admin.master_pondok.tambah_data', compact('prov'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_pondok(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $codePondok = CodeGenerator::code('d_pondok', 'p_code', 5, 'PDK');
            $id = DB::table('d_pondok')->max('p_id') + 1;
            DB::table('d_pondok')->insert([
                'p_id'          => $id,
                'p_code'        => $codePondok,
                'p_name'        => $request->p_name,
                'p_phone'       => $request->p_phone,
                'p_pengasuh'    => $request->p_pengasuh,
                'p_address'     => $request->p_address,
                'p_kec'         => $request->p_kec,
                'p_kab'         => $request->p_kab,
                'p_prov'        => $request->p_prov,
                'p_email'       => $request->p_email,
                'p_web'         => $request->p_web,
                'p_image'       => '',
                'p_description' => $request->p_description,
                'p_map'         => ''
            ]);


            DB::commit();
            return response()->json([
                'status' => 'sukses',
                'data'   => $request->p_name
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'Gagal',
                'message' => $e
            ]);
        }
    }

    public function get_detail_pondok($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $data = DB::table('d_pondok')->where('p_id', $id)->first();

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_galeriPondok($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $pondok = DB::table('d_pondok')->where('p_id', $id)->first();

        $galeri = DB::table('d_pondokdt')->where('pd_pondok', $id)->get();
        // dd($pondok);
        return view('admin.master_pondok.galeri', compact('pondok', 'galeri'));
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
