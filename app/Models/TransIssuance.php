<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransIssuance extends Model {
    use HasFactory;

    protected $table = 'trans_issuance_tab';
    protected $fillable = [
        'is_no',
        'borrower_id',
        'date_borrowed',
        'date_expected_return',
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

        //is_no
        if(isset($params['is_no']) && $params['is_no']){
            $query->where('is_no', $params['is_no']);
        }

        //id_no
        if(isset($params['id_no']) && $params['id_no']){
            $query->where('id_no', $params['id_no']);
        }

        return $query;
    }

    public static function getTransIssuance($params = []){
        $data = [];

        //default fields
        $fields = isset($params['all_fields']) && $params['all_fields'] ? ['*'] : [
            'is_no',
            'id_no',
            'date_borrowed',
            'date_expected_return',
            'preparedBy',
        ];

        $query = Self::select($fields);

        $query = Self::getConditions($query, $params);

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
