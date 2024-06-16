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

    public static function getDuplicate($params){
        $data = false;
        $conditions = [];

        $conditions[] = ['status', '=', 1];

        if(isset($params['id'])){
            $conditions[]  = ['id', '=', $params['id']];
        }

        if(isset($params['name'])){
            $conditions[] = ['name', '=', $params['name']];
        }

        $data = BookCategory::select('id', 'name', 'status')
        ->where($conditions)
        ->get()
        ->first();

        if(!empty($data)){
            $data = true;
        }

        return $data;
    }

}
