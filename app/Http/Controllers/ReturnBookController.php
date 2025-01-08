<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

//declare models
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

            dd($inputData);
        }

        return view('return_book.index', compact('data'));
    }
    
}
