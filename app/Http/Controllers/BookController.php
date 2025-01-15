<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//declare models used
use App\Models\BookCategory;
use App\Models\Book;
use App\Models\BookPublisher;
use App\Models\Author;

class BookController extends Controller
{
    //
    public function bookEntry(Request $request){
        $filterData = $request->all();

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }
        
       

        //To get sidebar design and menu ------------------------------
        $menuDatas = $this->getCachedMenus();

        $bookList = Book::getAllBooks($filterData);


        //PublishersList 
        $bookPublishers = BookPublisher::getBookPublishers([]);
     


    //  dd( $bookList);
        
        $bookCategories = BookCategory::getBookCategories([]);
        $authorsList = Author::getAllAuthors([
            'order' => ['name', 'asc']
        ]);

        $data = array(
            'books_data' => $bookList,
            'book_categories_data' => $bookCategories,
            'book_publishers_data' => $bookPublishers,
            'authors_data' => $authorsList,
            'filter_data' => $filterData
        );
    
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('books/books/index', compact('data'));

    }   

    public function bookEtnrySubmitAdd(Request $request){
        $data = [];
        $error = [];

        $checkAuthor = Author::checkAuthor(['name' => $request['author_name']]);

        $authorId = null;
            
        if(empty($checkAuthor)){
            //add new author if empty
            $newAuthor = new Author;

            $newAuthor->name = $request['author_name'];
            $newAuthor->status = 1;

            $newAuthor->save();

            $authorId = $newAuthor->id;
        }else{
            $authorId = $checkAuthor['id'];
        }

        # set params for books
        $params = [
            'book_cat_id' => $request['book_cat_id'],
            'author_id' => $authorId,
            'barcode' => $request['barcode'],
            'title' => $request['title'],
            'description' => $request['description'],
            'isbn' => $request['isbn'],
            'price' => $request['price'],            
            'publish_date' => $request['publish_date'],
            'publisher_id' => $request['publisher_id'],
            'status' => $request['status']
        ];

        #check if params had ID
        #if ID is present its for update function
        $response = null;
        $responseMessage = '';
        if($request->has('id') && $request['id']){
            # update function
            $book = Book::findOrFail($request['id']);

            try{
                $book->update($params);
                $responseMessage = 'Book successfully updated!';
            } catch (Exception $error) {
                $response = 1;
            }
        }else{
            # add function
            try{
                Book::create($params);
                $responseMessage = 'Successfully added new book!';
            } catch(Exception $error) {
                $response = 1;
            }
        }

        if($response){
            return response()->json(array(
                'message' => 'Error saving book information!',
                'has_error' => true
            ));
        }

        return response()->json(array(
            'message' => $responseMessage,
            'has_error' => false
        ));
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

    public function getBookInformation(Request $request){
        $data = [];

        $bookId = $request['book_id'];

        $books = Book::getBooks(['id' => $bookId]);
        $author = [];

       

        if(!empty($books)){
            $author = Author::getAuthor(['id' => $books['author_id']]);

            if(isset($author) && !empty($author)){
                unset($author['id']);
            }
        }

        $data = array_merge($books, $author);

        return response()->json($data);
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
