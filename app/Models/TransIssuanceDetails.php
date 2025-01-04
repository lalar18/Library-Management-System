<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransIssuanceDetails extends Model {
    use HasFactory;

    protected $table = 'trans_issuance_tab_det';
    protected $fillable = [
        'is_id',
        'book_id',
        'is_returned',
        'created_at',
        'updated_at',
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

        //is_id
        if(isset($params['is_id']) && $params['is_id']){
            if(is_array($params['is_id'])){
                $query->whereIn('is_id', $params['is_id']);
            }else{
                $query->where('is_id', $params['is_id']);
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

        //is_returned
        if(isset($params['is_returned'])){
            $query->where('is_returned', $params['is_returned']);
        }

        return $query; 
    }

    public static function getTransIssuanceDetails($params){
        $data = [];
        
        //default fields
        $fields = isset($params['all_fields']) && $params['all_fields'] ? ['*'] : [
            'id',
            'is_id',
            'book_id',
            'is_returned'
        ];

        $query = self::select($fields);
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
