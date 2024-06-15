<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//declare models used
use App\Models\User;


class LoginController extends Controller
{
    //

    public function index(){

        //check user if already logged in
        if($this->isLogin() == 1){
            return redirect()->route('home');
        }

        return view('login.index');
    }

    public function submitLogin(Request $request){
        $data = [];
        $params  = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $data  = User::checkUser($params);

        //check if return data is empty
        if(empty($data)){
            return redirect()->route('login');
        }

        //proceed to logging in user
        if(!empty($data)){
            session([Config('const.session_admin_key') => true ]);
            session([Config('const.session_admin_id') => $data['id']]);
            session([Config('const.session_admin_name') => $data['name']]);
            session([Config('const.session_email') => $data['email']]);

            //redirect to home
            return redirect()->route('home');
        }   

    }

    public function submitLogout(){
        //destroy all sessions
        session()->flush();

        if($this->isLogin == 0){
            return redirect()->route('login');
        }
    }





    public function testHash() {
        $testValue = 'admin123';

        dd(Hash::make($testValue));
    }

   
}
