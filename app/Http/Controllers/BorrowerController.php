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
}
