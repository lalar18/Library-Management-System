<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

//declare models
use App\Models\Book;
use App\Models\TransReturn;
use App\Models\TransReturnDetails;

class ReturnBookController extends Controller {
    //
    public function index(Request $request){
        $data = [];
        
        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        //generate new ir_no
        $tempIrNo = TransReturn::latest()->value('id') + 1;
        $irNo = 'IR-' . str_pad($tempIrNo, 6, '0', STR_PAD_LEFT);

        //compile data
        $data = [
            'userData' => $this->userData(),
            'ir_no' => $irNo
        ];
        // dd($this->userData());
        $menuDatas = $this->getCachedMenus();
        
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        //handle post method
        if($request->isMethod('post')){
            $inputData = $request->post();

            //check if ir_id exists
            $checkReturnData = TransReturn::getTransReturn([
                'ir_id' => $inputData['ir_id'] ?? ''
            ]);

            if($checkReturnData){
                //existing return record
                $returnDetailsData = [];
                $booksUpdate = [];

                foreach($inputData['trans_return_det']  as $key => $val){
                    if(isset($val['exclude']) && $val['exclude']){
                        continue;
                    }

                    $returnDetailsData[] = [
                        'rt_id' => $inputData['trans_return_tab']['ir_id'] ,
                        'book_id' => $val['book_id'],
                        'penalty_id' => isset($val['penalty_id']) && $val['penalty_id'] ? $val['penalty_id'] : 0,
                        'is_returned' => isset($val['is_returned']) && $val['is_returned'] ? $val['is_returned'] : 0,
                        'item_remarks' => $val['item_remarks'],
                        'preparedBy' => session(config('const.session_admin_id'))
                    ];
                    //git books_id to set status to 1
                    if(isset($val['is_returned']) && $val['is_returned']) {
                        $booksUpdate[] = $val['book_id'];
                    }
                }

                TransReturnDetails::insert($returnDetailsData);                

                $checkReturned = TransReturnDetails::where('rt_id', $inputData['trans_return_tab']['ir_id'])->where('is_returned', 1)->count();

                //check if all books are returned
                if(count($inputData['trans_return_det']) == $checkReturned){
                    //update trans_return_tab set to returned
                    TransReturn::where('ir_id', $inputData['trans_return_tab']['ir_id'])->update(['is_returned' => 1]);
                }

            }else{
                //not yet existing return record
                $returnData = [
                    'ir_id' => $irNo ?? '',
                    'is_id' => $inputData['trans_return_tab']['is_id'] ?? '',
                    'date_returned' => $inputData['trans_return_tab']['date_returned'] ?? '',
                    'prepared_by' => $inputData['trans_return_tab']['prepared_by'],
                    'created_at' => Carbon::now()->toDateTimeString()
                ];
    
                TransReturn::create($returnData);
                $lastId = TransReturn::latest()->value('id');
    
                $returnDetailsData = [];
                $booksUpdate = [];
    
                foreach($inputData['trans_return_det'] as $key => $val){
                    if(isset($val['exclude']) && $val['exclude']){
                        continue;
                    }
    
                    $returnDetailsData[] = [
                        'rt_id' => $lastId,
                        'book_id' => $val['book_id'],
                        'penalty_id' => isset($val['penalty_id']) && $val['penalty_id'] ? $val['penalty_id'] : 0,
                        'is_returned' => isset($val['is_returned']) && $val['is_returned'] ? $val['is_returned'] : 0,
                        'item_remarks' => $val['item_remarks'],
                        'preparedBy' => session(config('const.session_admin_id'))
                    ];
                    //git books_id to set status to 1
                    if(isset($val['is_returned']) && $val['is_returned']) {
                        $booksUpdate[] = $val['book_id'];
                    }
                }
    
                //insert to database
                TransReturnDetails::insert($returnDetailsData);                
            }

            //update book status
            Book::whereIn('id', $booksUpdate)->update(['status' => 1]);
            
            session()->flash('book_transaction_notification', [
                'has_error' => 0,
                'title' => 'Return Success',
                'message' => 'Books successfully returned!',
                'type' => 'alert-success'
            ]);
        }

        return view('return_book.index', compact('data'));
    }
    
}
