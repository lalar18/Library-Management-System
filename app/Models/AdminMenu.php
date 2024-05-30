<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    protected $table = 'admin_menu';

    public static function getAllMenu(){
        $data = array();

        $data = AdminMenu::select(
            'id',
            'main_cat_id',
            'name',
            'url',
            'icon',
        )
        ->where('status', 1)
        ->get()
        ->toArray();

        return $data;
    }
}
