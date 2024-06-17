<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//declare models used
use App\Models\BookCategory;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    //

    public function bookEntry(Request $request){
        $params = [];

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();

        $bookList = Book::getAllBooks();
        $bookCategories = BookCategory::getBookCategories([]);
        $authorsList = Author::getAllAuthors([
            'order' => ['name', 'asc']
        ]);

        $data = array(
            'books_data' => $bookList,
            'book_categories_data' => $bookCategories,
            'authors_data' => $authorsList
        );

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/books/index', compact('data'));

    }   

    public function bookEntryAdd(){

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();

        $data = array();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/books/book_list_add', compact('data'));
    }

    public function bookEntryAddSubmit(Request $request){

        $error = [];
        //check first user if logged in
        if($this->isLogin() == 0){
            $error = array(
                'message' => '<strong>Session Expired!</strong>, please reload page and try logging in.',
                'has_error' => true
            );
        }

        $duplicate = BookCategory::getDuplicate([
            'name' => $request['name']
        ]);

        if(!$duplicate){
            $response = BookCategory::create(array(
                'code' => $request['code'],
                'name' => $request['name'],
                'status' => $request['status']
            ));
        }else{
            $error = array(
                'message' => 'Category Name is already taken!',
                'has_error' => true
            );

            return response()->json($error);
        }

        return response()->json(
            [
                'message' => 'Successfully Added Category',
                'has_error' => false
            ]
        );
    }


    public function bookCategoriesSubmitEdit(Request $request){
        $error = [];

        //check first if user is logged in
        if($this->isLogin() == 0){
            $error = array(
                'message' => '<strong>Session Expired!</strong>, please reload page and try logging in.',
                'has_error' => true
            );
        }

        $duplicate = BookCategory::getDuplicate([
            'id' => $request['id'],
            'name' => $request['name']
        ]);

        if(empty($duplicate)){
            $bookCategory = BookCategory::findOrFail($request['id']);

            $bookCategory->update([
                'code' => $request['code'],
                'name' => $request['name'],
                'status' => $request['status'],
            ]);
        }else{
            $error = array(
                'message' => 'Category Name is already taken!',
                'has_error' => true
            );

            return response()->json($error);
        }

        
        return response()->json(
            [
                'message' => '<b>Book category</b> successfully updated!',
                'has_error' => false
            ]
        );

    }


    public function bookCategories(Request $request){
        //check first user if logged in
        $params = [];

        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }
    
        //check keyword if existing
        if($request->has('keyword') && $request['keyword']){
            $params['keyword'] = $request['keyword'];
        }
        // //check status if existing
        if($request->has('status') && $request['status']){
            $params['status'] = config('const.status_types.' . $request['status']);
        }

        $menuDatas = $this->getCachedMenus();

        $bookCategories = BookCategory::getBookCategories($params);

        $data = array();

        $data = array(
            'books_data' => $bookCategories,
            'filter_data' => $params
        );

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/category/index', compact('data'));
    }

    public function bookCategoriesAdd(){

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }
        
        $menuDatas = $this->getCachedMenus();

        $data = array();

        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/category/add', compact('data'));
    }
}
