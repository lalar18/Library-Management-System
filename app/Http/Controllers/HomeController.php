<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


//declare models used
use App\Models\AdminMainCategory;
use App\Models\AdminMenu;
use App\Models\AdminSubMenu;

class HomeController extends Controller
{
    //
    public function index() {
        $menuMainCategories = AdminMainCategory::getAllMainCategories();
        $menuMain = AdminMenu::getAllMenu();
        $menuSub = AdminSubMenu::getAllSubMenu();

        $menuMainCatIds = array_column($menuMain, 'main_cat_id');
        $menuSubMainIds = array_column($menuSub, 'menu_id');

        $data = array(
            'menu_main_categories' => $menuMainCategories,
            'menu_main' => $menuMain,
            'menu_sub' => $menuSub,
            'menu_main_cat_ids' => $menuMainCatIds,
            'manu_sub_main_ids' => $menuSubMainIds,
        );

        return view('home/index', compact('data'));
    }
}
