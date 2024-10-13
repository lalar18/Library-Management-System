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
            $query->wherein('BookCart.id', $params['id']);
        }

        //user_id
        if(isset($params['user_id']) && $params['user_id']){
            $query->where('BookCart.user_id', $params['user_id']);
        }
        
        return $query; 
    }

    public static function getCartItems($params = []) {
        $data = [];

        //default fields 
        $fields = [
            'BookCart.id',
            'BookCart.book_id',
            'BookCart.user_id',
            'Book.book_cat_id',
            'Book.author_id',
            'Book.barcode',
            'Book.title',
            'Book.description',
        ];

        //all fields
        if(isset($params['all_fields']) && $params['all_fields'] == 1){
            $fields = ['*'];
        }

        $query = BookCart::from('book_cart as BookCart');
        $query->select($fields); 

        $query->leftJoin('books as Book', 'Book.id', '=', 'BookCart.book_id'); 

        $query = Self::getCondition($query, $params);

        $data = $query->get();

        return $data->isNotEmpty() ? $data->toArray() : [];
    }

    public static function getRowBookCartItem($params = []) {
        $data = [];

        //default fields
        $fields = [
            'BookCart.id',
            'BookCart.book_id',
            'BookCart.user_id'
        ];

        //all_fields
        if(isset($params['all_fields']) && $params['all_fields'] == 1){
            $fields = ['*'];
        }

        $query = BookCart::from('book_cart as BookCart');
        $query->select($fields);

        $query = Self::getCondition($query, $params);

        $data = $query->first();

        return $data ? $data->toArray() : []; 

    }

}
