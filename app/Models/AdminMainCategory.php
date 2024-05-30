<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMainCategory extends Model
{
    use HasFactory;

    protected $table = 'admin_menu_categories';

    public static function getAllMainCategories(){
        $data = array();

        $data = AdminMainCategory::select(
            'id',
            'name',
        )
        ->where('status', 1)
        ->get()
        ->toArray();
        
        return $data;
    }
}
