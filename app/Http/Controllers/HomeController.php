<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


//declare models used
use App\Models\AdminMainCategory;
use App\Models\AdminMenu;

class HomeController extends Controller
{
    //
    public function index() {
        $menuMainCategories = AdminMainCategory::select('id', 'name')->get()->toArray();
        $menuMain = AdminMenu::select('id', 'main_cat_id', 'name')->get()->toArray();
        
        $menuMainCatIds = array_flip(array_column($menuMain, 'main_cat_id'));

        $data = array(
            'menu_main_categories' => $menuMainCategories,
            'menu_main' => $menuMain,
            'menu_main_cat_ids' => $menuMainCatIds,
        );

        return view('home/index', compact('data'));
    }
}
