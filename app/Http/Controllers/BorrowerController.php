<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    //
    public function index(){
        $data = array();

        $menuDatas = $this->getCachedMenus();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrowers/index', compact('data'));
    }
}
