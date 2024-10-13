<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Log;

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


        public function update(Request $request) {

            // Validation
            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'username' => 'required|string|max:255',
            //     'user_type' => 'required|in:0,1',
            //     'password' => 'nullable|string|min:8',
            //     'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // ]);

            $inputData = $request->post();

            $user = User::findOrFail($inputData['id']);

            $user->name = $inputData['name'];
            $user->username = $inputData['username'];
            $user->user_type = $inputData['user_type'];
            $user->save();

            $distPath = 'uploads/user/' . $inputData['id'];

            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
                $tempPath = $_FILES['profile_image']['tmp_name'];
                $fileName = $_FILES['profile_image']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                $newFileName = date('YmdHis'). '.' . $fileExtension;

                $user->profile_image = $newFileName; 
                $user->save();

                //transfer file
                if(!file_exists($distPath)){
                    if(mkdir($distPath, 0755, true)) {
                        move_uploaded_file($tempPath, $distPath . '/' . $newFileName);
                    }
                }else{
                    move_uploaded_file($tempPath, $distPath . '/' . $newFileName);
                }
            }

            return redirect('/admin/manage-users');
        }

        public function edit($id) {

            $data = [];
            //check first user if logged in
            if($this->isLogin() == 0){
                return redirect('/admin/login');
            }

            $userId = $id; //Session::get(Config('const.session_admin_id'));
            $menuDatas = $this->getCachedMenus();

            $params = ['id' => $id];
            $userData = User::getRowUser($params);  
   
            $data['userData'] = $userData;
            $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);


            return view('user/edit', compact('data'));

        }

    



    }