<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    //declare models used
     use App\Models\User;
    // use App\Models\Book;
    // use App\Models\Author;


    class UserController extends Controller {

        public function index(){
            $data = array();

             //check first user if logged in
            if($this->isLogin() == 0){
                return redirect('/admin/login');
            }

            $userId = Session::get(Config('const.session_admin_id'));
           //
            
            $menuDatas = $this->getCachedMenus();

            $userData = User::getUser([
                'user_id' => $userId
            ]);
       
            $data['userData'] = $userData;
            $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);
            // dd($menuDatas);
            return view('user/index', compact('data'));
        }

    



    }