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
                            <button class="btn btn-sm btn-info hint--top" aria-label="Detail" onclick="detail(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-folder-open"></i></button>
                            <button class="btn btn-sm btn-success hint--top" aria-label="Galeri" onclick="galeri(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-image"></i></button>
                            <button class="btn btn-sm btn-warning hint--top" aria-label="Edit" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger hint--top" aria-label="Hapus" onclick="hapus(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-trash"></i></button>
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
        return view('admin.pondok.tambah_data', compact('prov'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_pondok(Request $request)
    {
        DB::beginTransaction();
        try {
            $codePondok = CodeGenerator::code('d_pondok', 'p_code', 5, 'PDK');
            $id = DB::table('d_pondok')->max('p_id') + 1;

            $images = $request->file('p_image');
            if ($images != null) {
                $p_image = self::upload($images, $codePondok);
            }else{
                $p_image = '';
            }
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
                'p_image'       => $p_image,
                'p_description' => $request->p_description,
                'p_map'         => ''
            ]);

            DB::commit();
            return response()->json([
                'status' => 'success',
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

    public function upload($image, $code){
        $path = public_path()."/profile/upload/".$code;
        $name = $code;

        $destinationPath = $path;
        $extension       = $image->getClientOriginalExtension();
        $fileName        = $name.'.'.$extension;

        if($image->move($destinationPath, $fileName)){
            return $fileName;
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
            $idP = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $pondok = DB::table('d_pondok')->where('p_id', $idP)->first();
        $id = Crypt::encrypt($pondok->p_id);
        $code = $pondok->p_code;

        $galeri = DB::table('d_pondokdt')
            ->join('d_pondok', 'p_id', 'pd_pondok')
            ->where('pd_pondok', $idP)->get();

        return view('admin.pondok.galeri', compact('pondok', 'id', 'code', 'galeri'));
    }

    public function save_image(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $pd_pondok = Crypt::decrypt($request->pd_pondok);
            $detailId = DB::table('d_pondokdt')->where('pd_pondok', $pd_pondok)->max('pd_detailid') + 1;

            $images  = $request->file('pd_image');
            $imgName = self::uploadGaleri($images, $request->p_code, $detailId);

            DB::table('d_pondokdt')->insert([
                'pd_pondok'   => $pd_pondok,
                'pd_detailid' => $detailId,
                'pd_image'    => $imgName,
                'pd_imgdesc'  => $request->pd_imgdesc
            ]);

            DB::commit();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'Gagal',
                'message' => $e
            ]);
        }
    }

    public function uploadGaleri($image, $code, $dt){
        $path = public_path()."/galeri/upload/".$code;
        $name = "".$code."-".$dt."";

        $destinationPath = $path;
        $extension  = $image->getClientOriginalExtension();
        $fileName = $name.'.'.$extension;

        if($image->move($destinationPath, $fileName)){
            return $fileName;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_pondok($id)
    {
        try{
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $prov = m_prov::all();
        $kota = m_kota::all();
        $camat = m_camat::all();

        $data = DB::table('d_pondok')->where('p_id', $id)->first();

        return view('admin.pondok.edit_data', compact('prov', 'kota', 'camat', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pondok(Request $request)
    {
        DB::beginTransaction();
        try {
        
            $id  = $request->p_id;
            $img = DB::table('d_pondok')->where('p_id', $id)->first();

            $images = $request->file('p_image');
            if ($images != null) {
                $p_image = self::upload($images, $codePondok);
            }else{
                $p_image = $img->p_image;
            }

            DB::table('d_pondok')->where('p_id', $id)->update([
                'p_name'        => $request->p_name,
                'p_pengasuh'    => $request->p_pengasuh,
                'p_phone'       => $request->p_phone,
                'p_address'     => $request->p_address,
                'p_kec'         => $request->p_kec,
                'p_kab'         => $request->p_kab,
                'p_prov'        => $request->p_prov,
                'p_email'       => $request->p_email,
                'p_web'         => $request->p_web,
                'p_image'       => $p_image,
                'p_description' => $request->p_description
            ]);
        
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data'   => $img->p_name
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'  => 'Gagal',
                'message' => $e
            ]);
        }
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
