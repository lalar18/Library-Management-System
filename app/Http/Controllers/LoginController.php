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

        if(User::count() <= 0){
            return redirect('/admin/admin-register');
        }

        return view('login.index');
    }

    public function submitLogin(Request $request){
        $data = [];
        $params  = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $data  = User::checkUser($params);

        //check if return data is empty
        if(empty($data)){

            session()->flash('login_error', array(
                'message' => 'Either username or password is incorrect!',
                'data'=>  array(
                    'username' => $params['username'],
                    'password' => $params['password']
                )
            ));

            return redirect()->route('login');
        }

        //proceed to logging in user
        if(!empty($data)){
            session([config('const.session_admin_key') => true ]);
            session([config('const.session_admin_id') => (int)($data['id'])]);
            session([config('const.session_admin_name') => $data['name']]);
            session([config('const.session_username') => $data['username']]);
            
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

    public function register(){
        
        //check if already has a user
        if(User::count() > 0){
            return redirect()->route('home');
        }

        return view('login.register');
    }

    public function registerSubmit(Request $request){

        $user = new User;

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
    
        $user->save();

        if(User::count() > 0) { 
            return redirect()->route('home');
        }
    }



    public function testHash() {
        $testValue = 'admin123';

        dd(Hash::make($testValue));
    }

   
}
