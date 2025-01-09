<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;


//declare models used
use App\Models\AdminMainCategory;
use App\Models\AdminMenu;
use App\Models\AdminSubMenu;
use App\Models\Borrower;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\TransIssuance;
use App\Models\TransIssuanceDetails;

class HomeController extends Controller
{
    //
    public function index() {

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }
        
        $menuDatas = $this->getCachedMenus();

        $data = array();
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('home/index', compact('data'));
    }

    public function dashboard(){
        $data = [];

        $borrowedBooks = TransIssuanceDetails::count();

        $fields = [
            'trans_issuance_tab.*', 
        ];
        //student
        $query = TransIssuance::select($fields);
        $query->leftJoin('borrowers', 'borrowers.id', '=', 'trans_issuance_tab.borrower_id');
        $query->where('borrowers.type_id', 0);
        $countStudent = $query->count();

        //faculty
        $query = TransIssuance::select($fields);
        $query->leftJoin('borrowers', 'borrowers.id', '=', 'trans_issuance_tab.borrower_id');
        $query->where('borrowers.type_id', 1);
        $countFaculty = $query->count();

        //check first user if logged in
        if($this->isLogin() == 0){
            return redirect('/admin/login');
        }

        $menuDatas = $this->getCachedMenus();

        //compile data
        $data = [
            'count_borrowed_books' => $borrowedBooks,
            'count_student' => $countStudent,
            'count_faculty' => $countFaculty
        ];
        $data = array_merge($data, isset($menuDatas) ? $menuDatas : []);

        return view('home/dashboard', compact('data'));
    }

}
