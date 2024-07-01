<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_cat_id', 'author_id', 'barcode', 'title', 'description', 'isbn', 'price', 'publish_date', 'created_at', 'updated_at'];

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

        $query = Book::select('Book.*');
        
        if(isset($params['id'])){
            $query->where('id', '=', $params['id']);
        }

        $data = $query->get()->toArray();

        return $data;
    }

}
