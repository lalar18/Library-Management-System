<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;


//declare models used
use App\Models\AdminMainCategory;
use App\Models\AdminMenu;
use App\Models\AdminSubMenu;

class HomeController extends Controller
{
    //
    public function index() {

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }
        
        $menuDatas = $this->getCachedMenus();

        $data = array();
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('home/index', compact('data'));
    }

    public function dashboard(){

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();

        $data = array();
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('home/dashboard', compact('data'));
    }

}
