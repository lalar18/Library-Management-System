<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public static function getAllBooks(){
        $data = [];
        $conditions = [];

        $data = Book::select('*')
        ->get()
        ->toArray();

        return $data;
        
    }
}
