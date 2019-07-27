<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $datas = DB::table('m_kitab')->get();

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
            
            $codeKitab = CodeGenerator::code('m_kitab', 'k_code', 5, 'KT');
            $id = DB::table('m_kitab')->max('k_id') + 1;

            $images = $request->file('k_image');
            if ($images != null) {
                $k_image = $this->upload($images, $codeKitab);
            }else{
                $k_image = '';
            }

            DB::table('m_kitab')->insert([
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
                'data'   => $request->k_name
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

        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
        $numRandom = rand(1000, 1999);
        $nama = $code.'-'.$numRandom;
        if(File::makeDirectory($path,0777,true)){
            // $name = ''+$code+'-'rand(100, 900)'';        

            $destinationPath = $path;
            $extension       = $image->getClientOriginalExtension();
            $fileName        = $nama.'.'.$extension;

            if($image->move($destinationPath, $fileName)){
                return $fileName;
            }
        }else{
            return false;
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

        $data = DB::table('m_kitab')->where('k_id', $id)->first();

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_kitab(Request $request)
    {   
        $id = $request->id;
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $data = DB::table('m_kitab')->where('k_id', $id)->first();

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_kitab(Request $request)
    {
        DB::beginTransaction();
        try {

            $id  = $request->k_id;
            $img = DB::table('m_kitab')->where('k_id', $id)->first();

            $images = $request->file('k_image');
            if ($images != null) {
                $k_image = $this->upload($images, $img->k_code);
            }else{
                $k_image = $img->k_image;
            }

            DB::table('m_kitab')->where('k_id', $id)->update([
                'k_name'        => $request->k_name,
                'k_penulis'     => $request->k_penulis,
                'k_image'       => $k_image,
                'k_description' => $request->k_description
            ]);

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data'   => $img->k_name
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'Gagal',
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
    public function hapus_kitab(Request $request)
    {
        try {
            $id = Crypt::decrypt($request->id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        DB::beginTransaction();
        try {
        
            $data = DB::table('m_kitab')->where('k_id', $id);
            $path = public_path()."/kitab/upload/".$data->first()->k_code;
            $nama = $data->first()->k_name;

            if ($data->first()) {
                if (File::exists($path)) {
                    File::deleteDirectory($path);
                }

                $data->delete();
            }
        
            DB::commit();
            return response()->json([
                'status' => 'success',
                'nama'   => $nama
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'  => 'Gagal',
                'message' => $e
            ]);
        }
    }
}
