<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

//declare models used
use App\Models\AdminMainCategory;
use App\Models\AdminMenu;
use App\Models\AdminSubMenu;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $isLogin = false;

    public function __construct(){
        $this->clearCaches();
        $this->cachedMenuItems();
    }

    public function cachedMenuItems() {
        if(!Cache::has( config('const.cached_menu_2024') )){
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

            Cache::put(config('const.cached_menu_2024'), $data, config('const.cache_minutes_24h'));
        }      
    }

    public function getCachedMenus(){
        $data = array();

        if(Cache::has(config('const.cached_menu_2024'))){
            $data = Cache::get(config('const.cached_menu_2024'));
        }

        return $data;
    }

    public function clearCaches(){
        Cache::flush(config('const.cached_menu_2024'));
    }

    public function isLogin() {
        if(session()->has(Config('const.session_admin_key')) && session(Config('const.session_admin_key'))){
            return true;
        }
        return false;
    }
}
