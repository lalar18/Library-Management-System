<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//delcare models used
use App\Models\Borrower;

class BorrowerController extends Controller
{
    //
    public function index(Request $request){
        //check first user if logged in
        $filterData = [];

        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        //get data
        $filterData = $request->query();

        $data = array();
       
        $data['borrowersData'] = Borrower::getBorrowersList($filterData);
        $data['filterData'] = $filterData;

        $menuDatas = $this->getCachedMenus();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrowers/index', compact('data'));
    }

    public function submitBorrowersData(Request $request){
        $data = [];

        $data = $request->post();

        if($this->isLogin() == 0){
            $data = [
                'has_error' => 1,
                'message' => Config('const.login_required_error_msg')
            ];

            return json_encode($data);
        }

        $id = isset($data['id']) && $data['id'] ? $data['id'] : null;
        $lname = isset($data['lname']) && $data['lname'] ? $data['lname'] : '';
        $fname = isset($data['fname']) && $data['fname'] ? $data['fname'] : '';
        $mname = isset($data['mname']) && $data['mname'] ? $data['mname'] : '';

        if(isset($data['id']) && $data['id']){
            //if id is present and not empty function if for update
        }else{
            //if id is not present function is for add
        }

        return json_encode($data);
    }

}
