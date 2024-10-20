<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Log;

    use Illuminate\Support\Facades\Hash;

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
            return view('user/index', compact('data'));
        }

        public function add(Request $request){
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

            //handle post method
            if($request->isMethod('post')){
                $inputData = $request->post();

                $user = new User;

                $user->name = $request->name;
                $user->username = $request->username;
                $user->password = Hash::make($request->password);
                $user->user_type =  $request->user_type;
                $user->user_type =  $request->user_type;           
                $user->save();

                $lastId = $user->id;
                
                $user = User::findOrFail($lastId);

                $distPath = 'uploads/user/' .   $lastId ;

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

                
                session()->flash('test', 'Hello world');

                return redirect('/admin/manage-users');
                exit;
            }
       
            $data['userData'] = $userData;
            $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);
            return view('user.add', compact('data'));
        }


    


    // public function AddUser(Request $request){

    //     $user = new User;



    //     $user->name = $request->name;
    //     $user->username = $request->username;
    //     $user->password = Hash::make($request->password);
    //     $user->user_type =  $request->user_type;
    //     $user->user_type =  $request->user_type;           
    //     $user->save();

    //     $lastId = $user->id;

    //     $user = User::findOrFail($lastId);
    //     $distPath = 'uploads/user/' . $lastId; 



    //     if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
    //         $tempPath = $_FILES['profile_image']['tmp_name'];
    //         $fileName = $_FILES['profile_image']['name'];
    //         $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    //         $newFileName = date('YmdHis'). '.' . $fileExtension;

    //         $user->profile_image = $newFileName; 
    //         $user->save();
    //         if (!file_exists($distPath)) {
    //             mkdir($distPath, 0755, true);
    //         }
    
    //         // Path to the new file
    //         $newFilePath = $distPath . '/' . $newFileName;
    
    //         // Check if the file already exists and delete it
    //         if (file_exists($newFilePath)) {
    //             unlink($newFilePath); // Delete the existing file
    //         }
    
    //         // Move the uploaded file
    //         move_uploaded_file($tempPath, $newFilePath);
                    
    //                 // //transfer file
    //                 // if(!file_exists($distPath)){
    //                 //     if(mkdir($distPath, 0755, true)) {
    //                 //         move_uploaded_file($tempPath, $distPath . '/' . $newFileName);
    //                 //     }
    //                 // }else{
    //                 //     move_uploaded_file($tempPath, $distPath . '/' . $newFileName);
    //                 // }
    //             }
    
    //             return redirect('/admin/manage-users');

    //     // if(User::count() > 0) { 
    //     //     return redirect()->route('home');
    //     // }
    //         }
    // }




        public function update(Request $request) {

            $inputData = $request->post();

            $user = User::findOrFail($inputData['id']);

            //get prev image
            $prevImage = $user->profile_image; 

            $user->name = $inputData['name'];
            $user->username = $inputData['username'];
            $user->user_type = $inputData['user_type'];
            $user->save();

            $prevPath = 'uploads/user/' . $inputData['id'] . '/' . $prevImage;
           

            $distPath = 'uploads/user/' . $inputData['id'];

            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
                $tempPath = $_FILES['profile_image']['tmp_name'];
                $fileName = $_FILES['profile_image']['name'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                $newFileName = date('YmdHis'). '.' . $fileExtension;

                $user->profile_image = $newFileName; 
                $user->save();

                // Check if the destination directory exists
                if (!file_exists($distPath)) {
                    if(mkdir($distPath, 0755, true)){
                        move_uploaded_file($tempPath, $distPath . '/' . $newFileName);
                    }
                }else{
                    move_uploaded_file($tempPath, $distPath . '/' . $newFileName);
                }

                //check prev file if exist, then delete
                if(file_exists($prevPath)){
                    unlink($prevPath);
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