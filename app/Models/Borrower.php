<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = ['id_no', 'type_id', 'fname', 'mname','lname', 'contact_no', 'email'];

    public static function getBorrowersList($params = []){
        $data = [];

        $query = Borrower::select('*');

        //check borrower designation
        if(isset($params['type_id'])){
            $query->where('type_id', '=', $params['type_id']);
        }

        //check keyword
        if(isset($params['keyword']) && $params['keyword']){
            $query->where('fname', 'like', '%' . $params['keyword'] . '%')
                ->orWhere('lname', 'like', '%' . $params['keyword'] . '%')
                ->orWhere('mname', 'like', '%' . $params['keyword'] . '%');
        }
        $data = $query->get()->toArray();

        return $data;
    }

    public static function getBorrowerInformation($params = []){
        $data = [];

        $query = Borrower::select('*');

        if(isset($params['id']) && $params['id']){
            $query->where('id', '=', '');
        }

        if(
            (isset($params['lname']) && $params['lname']) &&
            (isset($params['fname']) && $params['fname']) &&
            (isset($params['mname']) && $params['mname'])
        ){
            $query->where('lname', $params['lname'])
                ->where('fname', $params['fname'])
                ->where('mname', $params['mname']);
        }

        $data = $query->get()->first()->to_array();
        return $data;
    }
}
