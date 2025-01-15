<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_cat_id', 'author_id', 'barcode', 'title', 'description', 'isbn', 'price', 'publish_date', 'publisher_id', 'status', 'created_at', 'updated_at'];

    public static function getConditions($query, $params = []) {
        //id
        if(isset($params['id']) && $params['id']){
            if(is_array($params['id'])){
                $query->whereIn('id', $params['id']);
            }else{
                $query->where('id', $params['id']);
            }
        }

        //not_id
        if(isset($params['not_id']) && $params['not_id']){
            if(is_array($params['not_id'])){
                $query->whereNotIn('id', $params['not_id']);
            }else{
                $query->where('id', '!=', $params['not_id']);
            }
        }

        //keywords
        if(isset($params['keywords']) && $params['keywords']){

            $query->where('title', 'LIKE', '%' . $params['keywords'] . '%');
            $query->orWhere('description', 'LIKE', '%' . $params['keywords'] . '%');
            $query->orWhere('barcode', 'LIKE', '%' . $params['keywords'] . '%');
            
        }

        //genre
        if(isset($params['genre']) && $params['genre']){
            if(is_array($params['genre'])){
                $query->whereIn('book_cat_id', $params['genre']);
            }else{
                $query->where('book_cat_id', $params['genre']);
            }
        }

        //status 
        if(isset($params['status'])){
            $query->where('status', $params['status']);
        }

        //barcode
        if(isset($params['barcode']) && $params['barcode']) {
            $query->where('barcode', $params['barcode']);
        }

        return $query;
    }

    public static function getAllBooks($params){
        $data = [];
        $conditions = [];
        $orConditions = [];

        //default items per page 10
        $pageItems = 10;

        // //check keyword
        // if(isset($params['keyword'])){
        //     $conditions[] = ['title', 'LIKE', '%' . $params['keyword'] .'%'];
        //     $orConditions[] = ['description', 'LIKE', '%' . $params['keyword'] .'%'];
        // }

        // //check genre
        // if(isset($params['genre'])){
        //     $conditions[] = ['book_cat_id', '=', $params['genre']];
        // }

        $data = Book::select('books.*', 'authors.id AS author_id', 'authors.name AS author_name', 'publishers_tab.publisher_name')
                ->leftJoin('book_categories', 'books.book_cat_id', '=', 'book_categories.id')
                ->leftJoin('publishers_tab', 'books.publisher_id', '=', 'publishers_tab.id')
                ->leftJoin('authors', 'authors.id', '=', 'books.author_id');
        $data = self::getConditions($data, $params);

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
            'publisher_id',
            'author_id'
        ];

        //all fields
        if(isset($params['all_fields']) && $params['all_fields'] == 1){
            $fields = ['*'];
        }

        $query = Book::select($fields);

        $query = Self::getConditions($query, $params);

        $result = $query->get();

        return !empty($result) ? $result->toArray() : [];
    }

}
