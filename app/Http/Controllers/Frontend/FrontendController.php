<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pondok_slide = DB::table('m_pondok')->where('p_slide', '=', '1')->get();
        $pondok_latest = DB::table('m_pondok')->latest()->get();
        return view('frontend.landing', compact('pondok_slide', 'pondok_latest'));
    }

    // Pondok Pesantren
    public function pondok()
    {
        $data = DB::table('m_pondok')->limit(5)->latest()->get();
        $latest_kitab = self::grapKitab();

        return view('frontend.pondok.index', compact('data', 'latest_kitab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pondok_context($id)
    {
        try {
            $id = Crypt::decrypt($id);            
        } catch (\Exception $e) {
            return view('frontend.errors.404');
        }

        $pondok = DB::table('m_pondok')
            ->leftJoin('m_pondok_map', 'pm_pondok', 'p_id')
            ->where('p_id', $id)->first();
        $id_crypted = Crypt::encrypt($id);
        $latest_post = self::grapPondok();
        $latest_kitab = self::grapKitab();

        return view('frontend.pondok.context')->with(compact('pondok', 'id_crypted', 'latest_post', 'latest_kitab'));
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

    // Review Pondok
    public function review()
    {
        $provinsi = DB::table('m_wil_provinsi')->get();
        return view('frontend.review.index', compact('provinsi'));
    }

    public function get_review(Request $request)
    {
        $id = $request->id;
        $data = DB::table('m_review')
            ->select('m_review.*', 'users.name as username', 'p_name')
            ->join('m_pondok', 'p_id', 'r_pondok')
            ->join('users', 'id', 'r_user')
            ->where('r_pondok', $id)->get();

        return response()->json(['data' => $data]);
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
            ->select('m_review.*', 'users.name as username', 'p_name')
            ->join('m_pondok', 'p_id', 'r_pondok')
            ->join('users', 'id', 'r_user')->get();
        return $data;
    }

    public function get_maps()
    {
        $data = DB::table('m_pondok_map')
            ->leftJoin('m_pondok', 'p_id', 'pm_pondok')->get();

        return $data;
    }
}
