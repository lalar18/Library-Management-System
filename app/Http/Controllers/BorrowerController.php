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
        $lname = isset($data['lname']) && $data['lname'] ? $data['lname'] : null;
        $fname = isset($data['fname']) && $data['fname'] ? $data['fname'] : null;
        $mname = isset($data['mname']) && $data['mname'] ? $data['mname'] : null;

        $checkData = Borrower::getBorrowerInformation([
            'id' => $id,
            'lname' => $lname,
            'fname' => $fname,
            'mname' => $mname
        ]);

        if(isset($data['id']) && $data['id']){
            //if id is present and not empty function if for update
          
            if(!empty($checkData)){
                
                $data = [
                    'has_error' => 1,
                    'message' => Config('const.borrower_error_entry_duplicate')
                ];
            }else{
              
                $borrower = Borrower::findOrFail($data['id']);

                try{
                    
                    $borrower->update([
                        'id_no' => $data['id_no'],
                        'type_id' => $data['type_id'],
                        'fname' => $data['fname'],
                        'mname' => $data['mname'],
                        'lname' => $data['lname'],
                        'contact_no' => $data['contact_no'],
                        'email' => $data['email']
                    ]);

                    $data = [
                        'has_error' => 0,
                        'message' => Config('const.borrower_update_message')
                    ];
                }catch(e){
                    $data = [
                        'has_error' => 1,
                        'message' => Config('const.borrower_update_error')
                    ];
                }
            }
        }else{
            //if id is not present function is for add
            if(!empty($checkData)){
                $data = [
                    'has_error' => 1,
                    'message' => Config('const.borrower_error_entry_duplicate')
                ];
            }else{
                try{
                    Borrower::create([
                        'id_no' => $data['id_no'],
                        'type_id' => $data['type_id'],
                        'fname' => $data['fname'],
                        'mname' => $data['mname'],
                        'lname' => $data['lname'],
                        'contact_no' => $data['contact_no'],
                        'email' => $data['email']
                    ]);
                    
                    $data = [
                        'has_error' => 0,
                        'message' => Config('const.borrower_entry_message')
                    ];
                }catch(e){
                    $data = [
                        'has_error' => 1,
                        'message' => Config('const.borrower_entry_error')
                    ];
                }
            }
        }

        return json_encode($data);
    }

}
