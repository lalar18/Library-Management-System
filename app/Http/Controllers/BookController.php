<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//declare models used
use App\Models\BookCategory;

class BookController extends Controller
{
    //

    public function bookEntry(){
        $menuDatas = $this->getCachedMenus();

        $data = array();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/books/book_list', compact('data'));

    }   

    public function bookEntryAdd(){
        $menuDatas = $this->getCachedMenus();

        $data = array();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/books/book_list_add', compact('data'));
    }

    public function bookEntryAddSubmit(Request $request){

        $response = BookCategory::create(array(
                'code' => $request['code'],
                'name' => $request['name'],
                'status' => $request['status']
            )
        );

        return response()->json(
            [
                'success' => 'Successfully Added Category'
            ]
        );
    }


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

    public function bookCategoriesAdd(){
        $menuDatas = $this->getCachedMenus();

        $data = array();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/category/add', compact('data'));
    }
}
