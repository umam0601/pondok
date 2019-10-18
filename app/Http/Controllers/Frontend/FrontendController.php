<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use DB;
use Auth;
use App\m_pondok as Pondok;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pondok_slide = DB::table('m_pondok')->where('p_slide', '=', '1')->limit(5)->get();
        $pondok_latest = DB::table('m_pondok')->latest()->limit(12)->get();
        $kitab = DB::table('m_kitab')->get();
        // return $pondok_slide;
        return view('frontend.landing', compact('pondok_slide', 'pondok_latest', 'kitab'));
    }

    // Pondok Pesantren
    public function pondok()
    {
        $provinsi = DB::table('m_wil_provinsi')->get();
        $data = Pondok::with('review')
            ->join('m_wil_provinsi', 'wp_id', 'p_prov')
            ->latest()->paginate(3);
        // $data->appends()
        $latest_kitab = self::grapKitab();

        return view('frontend.pondok.index', compact('data', 'latest_kitab', 'provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pondok_context($id)
    {
        // return json_encode([ 'id' => $id, 'en' => Crypt::decrypt($id)]);
        try {
            $id = Crypt::decrypt($id);            
        } catch (\Exception $e) {
            return view('frontend.errors.404');
        }
        
        $pondok = DB::table('m_pondok')
            ->join('m_wil_provinsi', 'wp_id', 'p_prov')
            ->leftJoin('m_pondok_map', 'pm_pondok', 'p_id')
            ->where('p_id', $id)->first();
        $review = DB::table('m_review')
            ->select('r_id', 'r_description', 'users.name', DB::raw('date_format(m_review.created_at, "%d %M %Y") as r_date'))
            ->join('users', 'id', 'r_user')
            ->where('r_pondok', '=', $pondok->p_id)
            ->get();
        $id_crypted = Crypt::encrypt($id);
        $latest_post = self::grapPondok();
        $latest_kitab = self::grapKitab();
        
        return view('frontend.pondok.context')->with(compact('pondok', 'review','id_crypted', 'latest_post', 'latest_kitab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Kitab
    public function kitab(Request $request)
    {
        //
    }

    public function filter(Request $request)
    {
        $wp_id = $request->wp_id;
        $data = Pondok::with('review')->where('p_prov', '=', $wp_id)
            ->join('m_wil_provinsi', 'wp_id', 'p_prov')->paginate(2);
        $data->appends($request->only('wilayah'));

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
    public function searching(Request $request)
    {
        $provinsi = DB::table('m_wil_provinsi')->get();
        $latest_kitab = self::grapKitab();
        $data = Pondok::when($request->keyword, function ($query) use ($request) {
            $query->where('p_name', 'like', "%{$request->keyword}%");
                // ->orWhere('m_wil_provinsi.wp_name', 'like', "%{$request->keyword}%");
                // ->orWhere('m_wil_kota.wc_name', 'like', "%{$request->keyword}%");
        })
        ->join('m_wil_provinsi', 'wp_id', 'p_prov')->paginate(5);

        $data->appends($request->only('keyword'));

        return view('frontend.pondok.index', compact('data', 'latest_kitab', 'provinsi'));
    }

    public function wilayah(Request $request)
    {
        // return json_encode($request->all());
        $prov  = $request->prov;
        $kota  = $request->kota;
        $camat = $request->camat;

        if ($kota == null || $kota == 'all') {
            $data = Pondok::with('review')->where('p_prov', '=', $prov)
                ->join('m_wil_provinsi', 'wp_id', 'p_prov')
                ->select('m_pondok.*', 'wp_id', 'wp_name as wilayah')->paginate(3);
            $wilName = DB::table('m_wil_provinsi')
                ->where('wp_id', $prov)
                ->select('wp_id as id_wil', 'wp_name as nama_wil')->first();
        }elseif ($camat == null || $camat == 'all') {
            $data = Pondok::with('review')->where('p_kab', '=', $kota)
                ->join('m_wil_kota', 'wc_id', 'p_kab')
                ->select('m_pondok.*', 'wc_id', 'wc_name as wilayah')->paginate(3);
            $wilName = DB::table('m_wil_kota')
                ->where('wc_id', $kota)
                ->select('wc_id as id_wil', 'wc_name as nama_wil')->first();
        }else{
            $data = Pondok::with('review')->where('p_kec', '=', $camat)
                ->join('m_wil_kecamatan', 'wk_id', 'p_kec')
                ->select('m_pondok.*', 'wk_id', 'wk_name as wilayah')->paginate(3);
            $wilName = DB::table('m_wil_kecamatan')
                ->where('wk_id', $camat)
                ->select('wk_id as id_wil', 'wk_name as nama_wil')->first();
        }

        $data->appends($request->only('wilayah'));
        $provinsi = DB::table('m_wil_provinsi')->get();
        $latest_kitab = self::grapKitab();
        
        return view('frontend.pondok.wilayah', compact('data', 'latest_kitab', 'provinsi', 'wilName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Review Pondok 
    public function review(Request $request)
    {
        // return json_encode($request->user);
        // $user = null;
        $pondok = null;
        $pondokCrypt = null;
        
        $provinsi = DB::table('m_wil_provinsi')->get();
        $data = DB::table('m_review')
            ->select('m_review.*', 'users.name as username', 'p_id','p_name', DB::raw('date_format(m_review.created_at, "%d %M %Y") as r_date'))
            ->join('m_pondok', 'p_id', 'r_pondok')
            ->join('users', 'id', 'r_user')->paginate(3);
        
        // if ($request->user != null) {
        //     $user = Crypt::decrypt($request->user);
        // } 
        if ($request->pondok != null) {
            $pondokCrypt = $request->pondok;
            $p_id = Crypt::decrypt($request->pondok);
            $pondok = DB::table('m_pondok')->where('p_id', '=', $p_id)->first();
        }
        
        // return json_encode($request->user);

        return view('frontend.review.index', compact('data', 'provinsi', 'pondok','pondokCrypt'));
    }

    public function cari_pondok(Request $request)
    {
        $cari = $request->term;
        $data = DB::table('m_pondok')
            ->select('m_pondok.*')
            ->where(function ($q) use ($cari) {
                $q->whereRaw("p_name like '%" . $cari . "%'");
                $q->orWhereRaw("p_code like '%" . $cari . "%'");
            })
            ->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function set_pondok(Request $request)
    {
        $p_id = $request->p_id;
        $data = DB::table('m_pondok')->where('p_id', '=', $p_id)->select('p_id as id', 'p_name as name')->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function get_review(Request $request)
    {
        $id = $request->id;
        $data = DB::table('m_review')
            ->select('m_review.*', 'users.name as username', 'p_id','p_name', DB::raw('date_format(m_review.created_at, "%d %M %Y") as r_date'))
            ->join('m_pondok', 'p_id', 'r_pondok')
            ->join('users', 'id', 'r_user')
            ->where('r_pondok', $id)->paginate(5);
        $provinsi = DB::table('m_wil_provinsi')->get();
        $pondok   = null;

        return view('frontend.review.index', compact('data', 'provinsi', 'pondok'));
    }

    public function save_review(Request $request)
    {
        DB::beginTransaction();
        try {
            $r_id = DB::table('m_review')->max('r_id') + 1;
            DB::table('m_review')->insert([
                'r_id'          => $r_id,
                'r_user'        => $request->user_id,
                'r_pondok'      => $request->r_pondok,
                'r_description' => $request->r_description
            ]);
        
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data'   => ''
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

    public function get_pondok($id)
    {
        $data = DB::table('m_pondok')->where('p_kec', $id)->get();

        return response()->json([
            'pondok' => $data
        ]);
    }

    public function grapPondok()
    {
        $data = DB::table('m_pondok')
            ->limit(5)->latest()->get();
        return $data;
    }

    public function grapKitab()
    {
        $data = DB::table('m_kitab')
            ->limit(5)->latest()->get();

        return $data;
    }

    public function grapReview()
    {
        $data = DB::table('m_review')
            ->select('m_review.*', 'users.name as username', 'p_id', 'p_name')
            ->join('m_pondok', 'p_id', 'r_pondok')
            ->join('users', 'id', 'r_user')->limit(10)->get();
        return $data;
    }

    public function get_maps()
    {
        $data = DB::table('m_pondok_map')
            ->leftJoin('m_pondok', 'p_id', 'pm_pondok')
            ->select('p_id', 'p_name', 'pm_latitude', 'pm_longitude')->get();

        return $data;
    }
}

// u can use  'pondokCrypt'