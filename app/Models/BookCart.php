<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCart extends Model{
    use HasFactory;

    protected $table = 'book_cart';

    protected $fillable = [
        'book_id',
        'user_id',
        'created',
        'updated'
    ];

    protected $casts  = [
        'created' => 'datetime',
        'updated' => 'datetime'
    ];

    public static function getCondition($query, $params = []) {

        //id
        if(isset($params['id']) && $params['id']){
            $query->where('id', $params['id']);
        }

        
        return $query; 
    }

    public static function getCartItems() {
        $data = [];

        
    }

}
