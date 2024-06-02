<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//declare models used
use App\Models\BookCategory;

class BookController extends Controller
{
    //

    public function bookCategories(){
        $menuDatas = $this->getCachedMenus();

        $bookCategories = BookCategory::getBookCategories();

        $data = array();

        $data = array(
            'books_data' => $bookCategories
        );

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/category/index', compact('data'));
    }
}
