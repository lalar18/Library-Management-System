<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_cat_id', 'author_id', 'barcode', 'title', 'description', 'isbn', 'price', 'publish_date', 'status', 'created_at', 'updated_at'];

    public static function getAllBooks($params){
        $data = [];
        $conditions = [];
        $orConditions = [];

        //default items per page 10
        $pageItems = 10;

        //check keyword
        if(isset($params['keyword'])){
            $conditions[] = ['title', 'LIKE', '%' . $params['keyword'] .'%'];
            $orConditions[] = ['description', 'LIKE', '%' . $params['keyword'] .'%'];
        }

        //check genre
        if(isset($params['genre'])){
            $conditions[] = ['book_cat_id', '=', $params['genre']];
        }

        $data = Book::select('books.*', 'authors.id AS author_id', 'authors.name AS author_name')
        ->leftJoin('book_categories', 'books.book_cat_id', '=', 'book_categories.id')
        ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
        ->where($conditions)
        ->orWhere($orConditions);

        return $data->paginate($pageItems);
    }

    public static function getBooks($params = []){
        $data = [];

        $query = Book::select('books.*');
        
        //id
        if (isset($params['id'])) {
            $query->where('id', '=', $params['id']);
        }

        //barcode
        if(isset($params['barcode']) && $params['barcode']){
            $query->where('barcode', '=', $params['barcode']);
        }

        $result = $query->get()->first();
        $data = !empty($result) ? $result->toArray() : [];

        return $data;
    }

    public static function getBookList($params = []){
        $data = [];

        $fields = [
            'id',
            'book_cat_id',
            'barcode',
            'title',
            'description',
            'author_id'
        ];

        //all fields
        if(isset($params['all_fields']) && $params['all_fields'] == 1){
            $fields = ['*'];
        }

        $query = Book::select($fields);

        $query = Self::getCondition($query, $params);

        $result = $query->get();

        return !empty($result) ? $result->toArray() : [];
    }


    public static function getCondition($query, $params = []){
        
        //id
        if(isset($params['id']) && $param['id']){
            $query->where('id', '=', $params['id']);
        }

        //barcode
        if(isset($params['barcode']) && $params['barcode']){
            $query->where('barcode', '=', $params['barcode']);
        }

        return $query;
    }   

}
