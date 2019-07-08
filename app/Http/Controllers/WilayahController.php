<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\m_prov;
use App\m_kota;
use App\m_camat;
use App\m_desa;

class WilayahController extends Controller
{
    public function get_city($id)
    {
        $city = m_kota::where('wc_provinsi', '=', $id)->get();

        return response()->json([
            'kota' => $city
        ]);
    }

    public function get_kecamatan($id)
    {
        $camat = m_camat::where('wk_kota', '=', $id)->get();

        return response()->json([
            'camat' => $camat
        ]);
    }

    public function get_desa($id)
    {
        $desa = m_desa::where('wd_kecamatan', '=', $id)->get();

        return response()->json([
            'desa' => $desa
        ]);
    }
}
