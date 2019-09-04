<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User as user;
use Session;
use Auth;

class Login_controller extends Controller
{
    public function showLoginForm() {
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $user = user::where('name', $request->name)->first();

        if ($user->role_admin == '1') {

            if($user && Hash::check($request->password, $user->password)){
                Auth::login($user);
                
                // Session([
                //     'holding'   => $user->perusahaan->holding,
                //     'comp'      => $user->perusahaan
                // ]);
                // if ($user->role_admin == '1') {
                    return redirect()->route('admin');
                // } else {
                //     return redirect()->route('frontend.index');
                // }
                
            }
        }        

        Session::flash('info', 'Kombinasi Password dan Username Tidak Ditemukan');

        return redirect()->back()->withInput($request->all());
    }

    public function authenticate_user(Request $request){
        $user = user::where('name', $request->name)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            return response()->json('berhasil');
            // Session([
            //     'holding'   => $user->perusahaan->holding,
            //     'comp'      => $user->perusahaan
            // ]);
            // if ($user->role_admin == '1') {
            //     return redirect()->route('admin');
            // } else {
                // return redirect()->route('frontend.index');
            // }
            
        }

        return response()->json('gagal');

        // Session::flash('info', 'Kombinasi Password dan Username Tidak Ditemukan');

        // return redirect()->back()->withInput($request->all());
    }

    public function logout(){
        Auth::logout();
        Session::flush();

        // Session::flash('no-loading', 'true');

        return redirect()->route('admin.login');
    }
}
