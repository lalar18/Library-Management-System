<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransReturnDetails extends Model {

    use HasFactory;

    protected $table = 'trans_return_det';
    protected $fillable = [
        'rt_id',
        'book_id',
        'penalty_id',
        'is_returned',
        'item_remarks',
        'preparedBy',
        'created_at',
        'updated_at'
    ];

    public static function getConditions($query, $params = []) {
        //id
        if(isset($params['id']) && $params['id']){
            if(is_array($params['id'])){
                $query->whereIn('id', $params['id']);
            }else{
                $query->where('id', $params['id']);
            }
        }

        //not_id
        if(isset($params['not_id']) && $params['not_id']){
            if(is_array($params['not_id'])){
                $query->whereNotIn('id', $params['not_id']);
            }else{
                $query->where('id', '!=', $params['not_id']);
            }
        }

        //rt_id
        if(isset($params['rt_id']) && $params['rt_id']){
            if(is_array($params['rt_id'])){
                $query->whereIn('rt_id', $params['rt_id']);
            }else{
                $query->where('rt_id', $params['rt_id']);
            }
        }

        //book_id
        if(isset($params['book_id']) && $params['book_id']){
            if(is_array($params['book_id'])){
                $query->whereIn('book_id', $params['book_id']);
            }else{
                $query->where('book_id', $params['book_id']);
            }
        }

        //penalty_id
        if(isset($params['penalty_id']) && $params['penalty_id']){
            if(is_array($params['penalty_id'])){
                $query->whereIn('penalty_id', $params['penalty_id']);
            }else{
                $query->where('penalty_id', $params['penalty_id']);
            }
        }

        //is_returned
        if(isset($params['is_returned'])){
            $query->where('is_returned', $params['is_returned']);
        }

        //preparedBy
        if(isset($params['preparedBy']) && $params['preparedBy']){
            if(is_array($params['preparedBy'])){
                $query->whereIn('preparedBy', $params['preparedBy']);
            }else{
                $query->where('preparedBy', $params['preparedBy']);
            }
        }

        return $query;
    }

    public static function getTransReturnDetails($params = []){
        $data = [];

        //default fields
        $fields = isset($params['all_fields']) && $params['all_fields'] ? ['*'] : [
            'id',
            'rt_id',
            'book_id',
            'penalty_id',
            'is_returned',
            'item_remarks',
            'preparedBy'
        ];

        $query = self::self($fields);
        $query = self::getConditions($query, $params);

        //is_multiple
        if(isset($params['is_multiple']) && $params['is_multiple']){
            //return multiple row
            $data = $query->get();
            return $data->isNotEmpty() ? $data->toArray() : [];
        }

        //return single row
        $data = $query->first();
        return $data ? $data->toArray() : [];
    }

}
