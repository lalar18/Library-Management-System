<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

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
}
