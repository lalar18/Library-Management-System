<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnBookController extends Controller
{
    //
    public function index(){
        $data = [];

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('return_book.index', compact('data'));
    }
}
