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

class AdminKitabController extends Controller
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

    public function get_kitab()
    {
        $datas = DB::table('d_kitab')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('action', function ($datas) {
                return '<div class="btn-group">
                            <button class="btn btn-sm btn-info hint--top" aria-label="Detail" onclick="detail(\''.Crypt::encrypt($datas->k_id).'\')"><i class="fa fa-fw fa-folder-open"></i></button>
                            <button class="btn btn-sm btn-warning hint--top" aria-label="Edit" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->k_id).'\')"><i class="fa fa-fw fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger hint--top" aria-label="Hapus" onclick="hapus(\''.Crypt::encrypt($datas->k_id).'\')"><i class="fa fa-fw fa-trash"></i></button>
                        </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_kitab(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            
            $codeKitab = CodeGenerator::code('d_kitab', 'k_code', 5, 'KT');
            $id = DB::table('d_kitab')->max('k_id') + 1;

            $images = $request->file('k_image');
            if ($images != null) {
                $k_image = $this->upload($images, $codeKitab);
            }else{
                $k_image = '';
            }

            DB::table('d_kitab')->insert([
                'k_id'          => $id,
                'k_code'        => $codeKitab,
                'k_name'        => $request->k_name,
                'k_penulis'     => $request->k_penulis,
                'k_image'       => $k_image,
                'k_description' => $request->k_description
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
        $path = public_path()."/kitab/upload/".$code;
        $name = $code;

        $destinationPath = $path;
        $extension       = $image->getClientOriginalExtension();
        $fileName        = $name.'.'.$extension;

        if($image->move($destinationPath, $fileName)){
            return $fileName;
        }
    }

    public function get_detail(Request $request)
    {   
        $id = $request->id;
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $data = DB::table('d_kitab')->where('k_id', $id)->first();

        return response()->json([
            'data' => $data
        ]);
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
