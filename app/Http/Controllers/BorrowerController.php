<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//delcare models used
use App\Models\Borrower;

class BorrowerController extends Controller
{
    //
    public function index(){
        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $data = array();
       
        $data['borrowersData'] = Borrower::getBorrowersList();

        $menuDatas = $this->getCachedMenus();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrowers/index', compact('data'));
    }
}
