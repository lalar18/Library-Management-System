<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $table = 'book_categories';
    protected $fillable = ['code', 'name', 'status', 'created_at', 'updated_at'];

    public static function getBookCategories(){
        $data = array();

        $data = BookCategory::select(
            'id',
            'code',
            'name',
            'status'
        )
        ->get()
        ->toArray();

        return $data;
    }

    public static function getDuplicate($data){
        
    }

}
