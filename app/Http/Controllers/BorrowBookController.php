<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    //
    public function index() {
        $data = array();

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrow_book/index', compact('data'));
    }
}
