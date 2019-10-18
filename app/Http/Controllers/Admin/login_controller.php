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
        // return json_encode($request->all());
        $user = user::where('name', $request->name)->first();

        if ($user->role_admin == '1') {

            if($user && Hash::check($request->password, $user->password)){
                Auth::login($user);

                // user::where('name', $request->name)->update([
                //     'status' => '1'
                // ]);

                return redirect()->route('admin');
            }
        }

        Session::flash('info', 'Kombinasi Password dan Username Tidak Ditemukan');

        return redirect()->back()->withInput($request->all());
    }

    public function authenticate_user(Request $request){
        // return json_encode($request->all());
        $user = user::where('name', $request->name)->first();

        if($user && Hash::check($request->password, $user->password)){
            Auth::login($user);

            // user::where('name', $request->name)->update([
            //     'status' => '1'
            // ]);
            return response()->json('success');
        }else{
            return response()->json('gagal');
        }
    }

    public function logout(Request $request){
        $user = user::where('name', $request->username)->first();
        // return json_encode($request->all());
        Auth::logout();
        Session::flush();

        if ($user->role_admin == '1') {
            // return 'Admin';
            // user::where('name', $request->username)->update([
            //     'status' => '0'
            // ]);
            return redirect()->route('admin.login');
        }else{

            // user::where('name', $request->username)->update([
            //     'status' => '0'
            // ]);
            // return redirect()->route('frontend.index');
        }
    }
}
