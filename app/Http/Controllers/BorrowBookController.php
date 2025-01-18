<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//delcare models used
use App\Models\Borrower;    
use App\Models\Book;
use App\Models\BookCart;
use App\Models\BookCategory;
use App\Models\Author;
use App\Models\TransIssuance;
use App\Models\TransIssuanceDetails;
use App\Models\Penalty;

class BorrowBookController extends Controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(Request $request) {
        $data = array();

        //get latest id
        $latestId = (int)TransIssuance::latest()->value('id') + 1;

        //generate issuance number
        $issuanceNo = 'IS-' . str_pad($latestId, 6, '0', STR_PAD_LEFT);

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();

        $data = [
            'userData' => $this->userData(),
            'tempIssuanceNo' => $issuanceNo
        ];
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        if($request->isMethod('post')){
            $inputData = $request->post();

            $transIssuanceTab = isset($inputData['trans_issuance_tab']) && $inputData['trans_issuance_tab'] ? $inputData['trans_issuance_tab'] : [];
            $transIssuanceTabDet = isset($inputData['trans_issuance_tab_det']) && $inputData['trans_issuance_tab_det'] ? $inputData['trans_issuance_tab_det'] : [];

            $booksIdList = array_column($transIssuanceTabDet, 'book_id');
            // dd($booksIdList);

            //proceed saving to table
            if($transIssuanceTab && $transIssuanceTabDet){
                TransIssuance::create($transIssuanceTab);

                //get latest issuance id
                $isId = TransIssuance::latest()->value('id');

                $transDetails = [];
                foreach($transIssuanceTabDet as $key => $val){
                    $transDetails[]  = [
                        'is_id' => $isId,
                        'book_id' => $val['book_id'],
                        'created_at' => Carbon::now()
                    ];
                }

                //insert all details
                TransIssuanceDetails::insert($transDetails);

                //update books borrowed status to borrowed
                $booksIdList = array_column($transDetails, 'book_id');
                Book::whereIn('id', $booksIdList)->update(['status' => 2, 'updated_at' => Carbon::now()]);

                // Set flash data for transaction notification
                session()->flash('book_transaction_notification', [
                    'has_error' => 0,
                    'title' => 'Transaction Success',
                    'message' => 'Books successfully borrowed!',
                    'type' => 'alert-success'
                ]);
            }
            
        }
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

    public function transactionInformation(Request $request){
        $data = [];
        $leftJoins = [];

        $leftJoins[] = [
           
        ];
        $leftJoins = [
            1 => [
                'trans_return_tab', 
                'trans_return_tab.is_id', '=', 
                'trans_issuance_tab.id'
            ],
            2 => [
                'borrowers',
                'borrowers.id', '=',
                'trans_issuance_tab.borrower_id'
            ],
            3 => [
                'borrower_type',
                'borrower_type.id', '=',
                'borrowers.type_id'
            ]
        ];

        $filterData = $request->query();

        $fields = [
            'trans_issuance_tab.id AS issuance_id',
            'trans_issuance_tab.is_no',
            'trans_issuance_tab.borrower_id',
            'trans_issuance_tab.date_borrowed',
            'trans_issuance_tab.date_expected_return',
            'trans_issuance_tab.preparedBy',
            'trans_return_tab.id AS issuance_return_id',
            'trans_return_tab.ir_id AS ir_no',
            'trans_return_tab.date_returned',
            'borrowers.id_no',
            'borrowers.type_id',
            'borrower_type.name AS borrower_type',
            'borrowers.fname',
            'borrowers.lname',
            'borrowers.mname',
            'borrowers.email',
            \DB::raw('(SELECT COUNT(*) FROM trans_issuance_tab_det WHERE trans_issuance_tab_det.is_id = trans_issuance_tab.id) AS borrowed_books'),
            \DB::raw('(SELECT COUNT(*) FROM trans_return_det WHERE trans_return_det.rt_id = trans_return_tab.id AND trans_return_det.is_returned = 1) AS returned_books')
        ];

        $query = TransIssuance::select($fields);

        foreach($leftJoins as $key => $val){
            $query->leftJoin($val[0], $val[1], $val[2], $val[3]);
        }

        //keyword
        if(isset($filterData['keyword']) && $filterData['keyword']){
            $query->where('trans_issuance_tab.is_no', 'LIKE', '%'. $filterData['keyword'] .'%')
                ->orWhere('trans_return_tab.ir_id', 'LIKE', '%'. $filterData['keyword'] .'%')
                ->orWhere(\DB::raw('CONCAT(borrowers.fname, " ", borrowers.lname)'), 'LIKE', '%' . $filterData['keyword'] . '%');
        }

        //borrower_type
        if(isset($filterData['borrower_type']) && $filterData['borrower_type']){
            $query->where('type_id', $filterData['borrower_type']);
        }

        $bookTransactions = $query->paginate(10);
        $bookTransactions->appends($filterData);

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        $data['filter_data'] = $filterData;
        $data['book_transactions'] = $bookTransactions;

        return view('borrow_book.transaction_information', compact('data'));
    }

    public function getBook(Request $request){
        $data = [];

        $userData = $this->userData(); 

        $data = $request->input();

        $searchBook = Book::getBookList([
            'barcode' => $data['barcode'],
            'not_id' => isset($data['book_id']) && $data['book_id'] ? $data['book_id'] : [],
            'status' => 1
        ]);

        $html = '';
        $bookCount = 1; 
        
        if(count($searchBook) > 1){
          
            $bookCount = count($searchBook);
            $html = view('borrow_book/books_data', ['bookData' => $searchBook])->render();
        }elseif(count($searchBook) == 1){
            //get book categories
            $bookCategoriesData = BookCategory::getBookCategories([]);
            $bookCategoriesArr = collect($bookCategoriesData)->pluck('name', 'id');

            //get author
            $authorData = Author::getAuthor([
                'id' => $searchBook[0]['id']
            ]);            

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
        // dd($data);
        return response()->json($data);
       
    }

    public function addToCartSelectedBooks(Request $request) {
        $data = [];
        $html = '';

        $inputData = $request->post();

        $userData = $this->userData();

        $bookCategoriesData = BookCategory::getBookCategories([]);
        $bookCategoriesArr = collect($bookCategoriesData)->pluck('name', 'id');

        //get author
        $authorData = Author::getAuthorsList();
        $authorArr = collect($authorData)->pluck('author_name', 'id');

        //check if books_id exist then proceed to adding to cart]
        if(isset($inputData['books_id']) && $inputData['books_id']){
            //get book information
            $searchBook = Book::getBookList([
                'id' => $inputData['books_id'],
                'status' => 1
            ]);

            //compileData
            $compiledData = [
                'bookData' => $searchBook,
                'authorData' => $authorArr,
                'categoryData' => $bookCategoriesArr
            ];

            $html = view('borrow_book/book_cart_data', $compiledData)->render(); 
          
            $data = [
                'has_error' => 0,
                'html' => $html
            ];
        }

        return response()->json($data);

    }

    public function getTransaction(Request $request){
        $data = [];
        $html = "";

        //get penalties list
        $penaltyData = Penalty::getPenalty([
            'is_multiple' => 1
        ]);

        $inputData = $request->post();

        $query = TransIssuance::select([
            'trans_issuance_tab.*',
            'borrowers.id_no',
            'borrowers.type_id',
            'borrowers.fname',
            'borrowers.mname',
            'borrowers.lname',
        ])
        ->leftJoin('borrowers', 'borrowers.id', '=', 'trans_issuance_tab.borrower_id')
        ->where('trans_issuance_tab.is_no', $inputData['is_no']);

        $transData = $query->first();
        $transData = $transData ? $transData->toArray() : [];
        
        if($transData) {
            $query = TransIssuanceDetails::select([
                'trans_issuance_tab_det.id',
                'trans_issuance_tab_det.book_id',
                'books.book_cat_id',
                'books.author_id',
                'books.barcode',
                'books.title',
                'books.description',
                'books.isbn',
                'books.price',
                'books.publish_date',
            ]);
            $query->leftJoin('books', 'books.id',  '=', 'trans_issuance_tab_det.book_id');
            $query = TransIssuanceDetails::getConditions($query, [
                'is_id' => $transData['id']
            ]);

            $booksData = $query->get()->toArray();

            $bookCategoriesData = BookCategory::getBookCategories([]);
            $bookCategoriesArr = collect($bookCategoriesData)->pluck('name', 'id');

            $authorData = array_column(Author::getAuthorsList([
                'status' => 1
            ]), 'author_name',  'id');

            //compile data
            $data = [
                'borrower_information' => $transData,
                'books_data' => $booksData,
                'authors_data' => $authorData,
                'categories_data' => $bookCategoriesArr,
                'penalty_data' => $penaltyData
            ];

            $html = view('return_book.return_book_cart_data', $data)->render();
            
            $data['html'] = $html;
        }
        
        return response()->json($data);
    }

}
