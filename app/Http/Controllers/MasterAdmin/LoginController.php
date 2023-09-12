<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.master.login');
    }

    public function login(Request $request)
    {   
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email','password');
    
        if (Auth::attempt($credentials)) {

            // toast('Login Successfully!','success');
            // alert()->success('SuccessAlert','Login Successfully!.');
            return redirect()->intended('master/home');
        }
        return redirect()->route('master-admin')->withErrors(['email' => 'You have entered invalid credentials.']);
        
    }

    public function showResetForm(Request $request,$id){

        $id1 = Crypt::decrypt($id);
        $user = User::where('id', $id1)->first();
        $email = Crypt::encrypt($user->email);

        return view('auth.master.reset',compact('user'));

    }

    public function submitResetForm(Request $request){

        $id = Crypt::decrypt($request->user_id);
        $user = User::where('id', $id)->first();

        $user->password = Hash::make($request->password);
        $user->is_master_role = 1;
        $user->is_master_status = 1;
        $user->master_link_status = 1;
        $user->update();


        alert()->success('SuccessAlert','Reset Password Successfully!.');
        return redirect()->route('master-admin');
    }


}
