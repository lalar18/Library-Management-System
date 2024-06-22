<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    //
    public function index() {
        $data = array();

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrow_book/index', compact('data'));
    }

    public function transactionInformation(){
        $data = [];

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrow_book.transaction_information', compact('data'));
    }

}
