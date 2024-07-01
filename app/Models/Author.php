<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name','status', 'created_at', 'updated_at'];

    public static function getAllAuthors($params) {
        $data = [];
        $conditions = [];
        
        $conditions[] = ['status','=', 1];

        $data = Author::select()
        ->where($conditions)
        ->orderBy('name', 'asc')
        ->get()
        ->toArray();

        return $data;
    }

    public static function checkAuthor($params = []){
        $data = [];

        $query = Author::select('id', 'name', 'status');

        if(isset($params['id'])){
            $query->where('id', '=', $params['id']);
        }

        if(isset($params['name'])){
            $query->where('name', '=', $params['name']);
        }
        
        //execute query
        $data = $query->get()->toArray();

        return $data;
    }

    public static function getAuthor($params = []){
        $data = [];

        $queries = Author::select('Author.id', 'Authors.name');

        if(isset($params['id'])){
            $queries->where('id', '=', $params['id']);
        }

        $data = $query->get()->toArray();
        return $data;
    }




}
