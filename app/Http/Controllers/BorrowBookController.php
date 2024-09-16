<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//delcare models used
use App\Models\Borrower;
use App\Models\Book;

class BorrowBookController extends Controller
{
    //
    public function index() {
        $data = array();

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrow_book/index', compact('data'));
    }

    //get borrower information
    public function getBorrowersList(){
        $data = [];

        $hasError = 0;

         //check first user if logged in
        if($this->isLogin() == 0){
           $hasError = 1;
        }

        $data['borrowersList'] = Borrower::getBorrowersList();

        return json_encode([
            'has_error' => $hasError,
            'data' => $data
        ]);
    }

    public function transactionInformation(){
        $data = [];

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('borrow_book.transaction_information', compact('data'));
    }

    public function getBook(Request $request){
        $data = [];

        $data = $request->input();

        $searchBook = Book::getBookList([
            'barcode' => $data['barcode']
        ]);

        $html = '';
        if(count($searchBook) > 1){
            $html = view('borrow_book/books_data', ['booksData' => $searchBook])->render();
        }

        $data = [
            'booksData' => $searchBook,
            'html' => $html
        ];

        return response()->json($data);
       
    }

}
