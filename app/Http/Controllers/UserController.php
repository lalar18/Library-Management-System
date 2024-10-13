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


        public function update(Request $request, $id) {
             // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'user_type' => 'required|in:0,1',
        'password' => 'nullable|string|min:8',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        // Find user by ID
        $user = User::findOrFail($id);

        // Update user details
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->user_type = $request->input('user_type');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete the old image if it exists
            if ($user->profile_image) {
                Storage::delete('public/images/' . $user->profile_image);
            }

            // Handle file upload
            $imageName = time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
            $request->file('profile_image')->storeAs('public/images', $imageName);

            // Save the new image name to the database
            $user->profile_image = $imageName;
        }

        // Save changes to database
        $user->save();

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully!');

    } catch (\Exception $e) {
        // Log the exception message
        Log::error('User update failed: ' . $e->getMessage());
        return back()->withErrors('An error occurred while updating the user.')->withInput();
    }
}

        public function edit($id) {

            $data = [];
            //check first user if logged in
            if($this->isLogin() == 0){
                return redirect('/admin/login');
            }

            $userId = $id; //Session::get(Config('const.session_admin_id'));
            $menuDatas = $this->getCachedMenus();



            var_dump($userId);
            die;

            $params = ['id' => $id];
            $userData = User::getRowUser($params);  


           // Get user data from the database
            // $userData = User::getRowUser([
            //     'user_id' => $id
            // ]);

   
            $data['userData'] = $userData;
            $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);


            return view('user/edit', compact('data'));

        }

    



    }