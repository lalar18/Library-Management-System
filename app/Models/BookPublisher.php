<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPublisher extends Model
{
    use HasFactory;

    protected $table = 'publishers_tab';
    protected $fillable = ['publisher_name', 'status', 'created_at', 'updated_at'];

    public static function getBookPublishers($params){
        $data = array();
        $conditions = [];
        $order = [];

        //check keywords if existing
        if(isset($params['keyword'])){
            $conditions[] = ['publisher_name','LIKE', '%' . $params['keyword'] .'%'];
        }

        //check status if existing
        if(isset($params['status'])){
            $conditions[] = ['status', '=', $params['status']];
        }

        //check id if exist
    if(isset($params['id'])){
            $conditions[] = ['status', '=', (int)$params['id']];
        }

        $data = BookPublisher::select(
            'id',
            'publisher_name',     
            'status'
        )
        ->where($conditions)
        ->orderBy('publisher_name', 'asc')
        ->get()
        ->toArray();

        return $data;
    }

    public static function getDuplicate($params){
        $data = false;
        $conditions = [];

        $conditions[] = ['status', '=', 1];

        if(isset($params['id']) && $params['id']){
            $conditions[]  = ['id', '=', $params['id']];
        }

        if(isset($params['publisher_name']) && $params['publisher_name']){
            $conditions[] = ['publisher_name', '=', $params['publisher_name']];
        }

        $data = BookPublisher::select('id', 'publisher_name', 'status')
        ->where($conditions)
        ->get()
        ->first();

        if(!empty($data)){
            $data = true;
        }

        return $data;
    }

}