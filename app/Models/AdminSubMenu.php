<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSubMenu extends Model
{
    use HasFactory;

    protected $table = 'admin_sub_menu';

    public static function getAllSubMenu() {
        $data = array();

        $data = AdminSubMenu::select(
            'id',
            'menu_id',
            'name',
            'url'
        )
        ->where('status', 1)
        ->get()
        ->toArray();

        return $data;
    }
}
