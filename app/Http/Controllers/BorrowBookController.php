<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//delcare models used
use App\Models\Borrower;
use App\Models\Book;
use App\Models\BookCart;
use App\Models\BookCategory;
use App\Models\Author;

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
        $bookCount = 1; 
        
        if(count($searchBook) > 1){
          
            $bookCount = count($searchBook);
            $html = view('borrow_book/books_data', ['bookData' => $searchBook])->render();
        }else{
            //if only one book is seen automatically add to cart
            //get book categories
            $bookCategoriesData = BookCategory::getBookCategories([]);
            $bookCategoriesArr = collect($bookCategoriesData)->pluck('name', 'id');

            //get author
            $authorData = Author::getAuthor([
                'id' => $searchBook[0]['id']
            ]); 

            $bookCart = new BookCart;
            $bookCart->book_id = $searchBook[0]['id'];
            $bookCart->save();

            //compile data
            $compiledData = [
                'bookData' => $searchBook,
                'authorData' => $authorData,
                'categoryData' => $bookCategoriesArr
            ];

            $html = view('borrow_book/book_cart_data', $compiledData)->render(); 
        }

        $data = [
            'booksData' => $searchBook,
            'html' => $html,
            'book_count' => $bookCount
        ];

        return response()->json($data);
       
    }

}
