<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public static function getAllBooks($params){
        $data = [];
        $conditions = [];
        $orConditions = [];

        //check keyword
        if(isset($params['keyword'])){
            $conditions[] = ['title', 'LIKE', '%' . $params['keyword'] .'%'];
            $orConditions[] = ['description', 'LIKE', '%' . $params['keyword'] .'%'];
        }

        //check genre
        if(isset($params['genre'])){
            $conditions[] = ['book_cat_id', '=', $params['genre']];
        }

        $data = Book::select('books.*')
        ->leftJoin('book_categories', 'books.book_cat_id', '=', 'book_categories.id')
        ->where($conditions)
        ->orWhere($orConditions)
        ->get()
        ->toArray();

        return $data;
        
    }
}
