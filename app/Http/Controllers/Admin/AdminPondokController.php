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

class AdminPondokController extends Controller
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

    public function get_pondok()
    {
        $datas = DB::table('m_pondok')->get();

        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('action', function ($datas) {
                if ($datas->p_slide == '1') {
                    return '<div class="btn-group">
                                <button class="btn btn-sm btn-info hint--top" aria-label="Detail" onclick="detail(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-folder-open"></i></button>
                                <button class="btn btn-sm btn-success hint--top" aria-label="Galeri" onclick="galeri(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-image"></i></button>
                                <button class="btn btn-sm btn-warning hint--top" aria-label="Edit" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger hint--top" aria-label="Hapus" onclick="hapus(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-trash"></i></button>
                                <button class="btn btn-sm btn-success hint--top" aria-label="Map" onclick="map(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-map"></i></button>
                                <button class="btn btn-sm btn-outline btn-danger hint--top" aria-label="Hilangkan dari slide" onclick="slider(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-desktop"></i></button>
                            </div>';
                }else{
                    return '<div class="btn-group">
                                <button class="btn btn-sm btn-info hint--top" aria-label="Detail" onclick="detail(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-folder-open"></i></button>
                                <button class="btn btn-sm btn-success hint--top" aria-label="Galeri" onclick="galeri(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-image"></i></button>
                                <button class="btn btn-sm btn-warning hint--top" aria-label="Edit" title="Edit" onclick="edit(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger hint--top" aria-label="Hapus" onclick="hapus(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-trash"></i></button>
                                <button class="btn btn-sm btn-success hint--top" aria-label="Map" onclick="map(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-map"></i></button>
                                <button class="btn btn-sm btn-outline btn-primary hint--top" aria-label="Tampilkan ke slide" onclick="slider(\''.Crypt::encrypt($datas->p_id).'\')"><i class="fa fa-fw fa-desktop"></i></button>
                            </div>';
                }
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
            $codePondok = CodeGenerator::code('m_pondok', 'p_code', 5, 'PDK');
            $id = DB::table('m_pondok')->max('p_id') + 1;

            $images = $request->file('p_image');
            if ($images != null) {
                $p_image = self::upload($images, $codePondok);
            }else{
                $p_image = '';
            }
            DB::table('m_pondok')->insert([
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
                'p_description' => $request->p_description
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
        $name = $code.'-'.rand(1000, 1999);

        if (File::exists($path)){
            File::deleteDirectory($path);
        }

        if(File::makeDirectory($path,0777,true)){
            $destinationPath = $path;
            $extension       = $image->getClientOriginalExtension();
            $fileName        = $name.'.'.$extension;

            if($image->move($destinationPath, $fileName)){
                return $fileName;
            }

        }else{
            return false;
        }
    }

    public function get_detail_pondok($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        $data = DB::table('m_pondok')->where('p_id', $id)->first();

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

        $pondok = DB::table('m_pondok')->where('p_id', $idP)->first();
        $id = Crypt::encrypt($pondok->p_id);
        $code = $pondok->p_code;

        $galeri = DB::table('m_pondokdt')
            ->join('m_pondok', 'p_id', 'pd_pondok')
            ->where('pd_pondok', $idP)->get();

        return view('admin.pondok.galeri', compact('pondok', 'id', 'code', 'galeri'));
    }

    public function save_image(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $pd_pondok = Crypt::decrypt($request->pd_pondok);
            $detailId = DB::table('m_pondokdt')->where('pd_pondok', $pd_pondok)->max('pd_detailid') + 1;

            $images  = $request->file('pd_image');
            $imgName = self::uploadGaleri($images, $request->p_code, $detailId);

            DB::table('m_pondokdt')->insert([
                'pd_pondok'          => $pd_pondok,
                'pd_detailid'        => $detailId,
                'pd_image'           => $imgName,
                'pd_img_description' => $request->pd_img_description
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

        $data = DB::table('m_pondok')->where('p_id', $id)->first();

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
            $img = DB::table('m_pondok')->where('p_id', $id)->first();

            $images = $request->file('p_image');
            if ($images != null) {
                $p_image = self::upload($images, $img->p_code);
            }else{
                $p_image = $img->p_image;
            }

            DB::table('m_pondok')->where('p_id', $id)->update([
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
    public function hapus_pondok(Request $request)
    {
        try{
            $id = Crypt::decrypt($request->id);
        } catch (\Exception $e) {
            return view('admin.errors.404');
        }

        DB::beginTransaction();
        try {
            
            $data = DB::table('m_pondok')->where('p_id', $id);
            $nama = $data->first()->p_name;

            if ($data->first()) {
                $pathProfile = public_path()."/profile/upload/".$data->first()->p_code;
                $pathGaleri = public_path()."/galeri/upload/".$data->first()->p_code;

                if (File::exists($pathProfile)){
                    File::deleteDirectory($pathProfile);
                }
                if (File::exists($pathGaleri)){
                    File::deleteDirectory($pathGaleri);
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

    public function map($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (Exception $e) {
            return view('admin.errors.404');
        }

        $pondok = DB::table('m_pondok')->where('p_id', $id)->first();
        $pondok_map = DB::table('m_pondok_map')->where('pm_pondok', $id)->first();

        return view('admin.pondok.map', compact('pondok', 'pondok_map'));
    }

    public function get_maps()
    {
        $data = DB::table('m_pondok_map')
            ->leftJoin('m_pondok', 'p_id', 'pm_pondok')->get();

        return $data;
    }

    public function get_lat_long(Request $request) {
        $id = $request->id;
        $data = DB::table('m_pondok_map')
            ->leftJoin('m_pondok', 'p_id', 'pm_pondok')
            ->where('pm_pondok', $id)->get();

        return $data;
    }

    public function check_latlng(Request $request)
    {
        $id = $request->id;
        $data = DB::table('m_pondok_map')->where('pm_pondok', $id)->get();

        return $data;
    }

    public function save_map(Request $request)
    {
        DB::beginTransaction();
        try {
            
            if ($request->pm_id != "" || $request->pm_id != null) {
                DB::table('m_pondok_map')->where('pm_pondok', $request->pm_pondok)->update([
                    'pm_latitude'  => $request->pm_latitude,
                    'pm_longitude' => $request->pm_longitude
                ]);
            }else{
                $id = DB::table('m_pondok_map')->max('pm_id') + 1;
                DB::table('m_pondok_map')->insert([
                    'pm_id'        => $id,
                    'pm_pondok'    => $request->pm_pondok,
                    'pm_latitude'  => $request->pm_latitude,
                    'pm_longitude' => $request->pm_longitude
                ]);
            }
            
            $data = DB::table('m_pondok')->where('p_id', $request->pm_pondok)->first();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data'   => Crypt::encrypt($data->p_id)
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status'  => 'Gagal',
                'message' => $e
            ]);
        }
    }

    public function slider($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (Exception $e) {
            return view('admin.errors.404');
        }

        DB::beginTransaction();
        try {
        
            $data = DB::table('m_pondok')->where('p_id', $id)->first();

            if ($data) {
                if ($data->p_slide == 1) {
                    $slide = '0';
                }else{
                    $slide = '1';
                }

                DB::table('m_pondok')->where('p_id', $id)->update([
                    'p_slide' => $slide
                ]);
            }
            
            $data = DB::table('m_pondok')->where('p_id', $id)->first();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'data'   => $data
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
