<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransReturn extends Model {
    use HasFactory;

    protected $table = 'trans_return_tab';
    protected $fillable = [
        'id_no',
        'is_id',
        'date_returned',
        'preparedBy',
        'created_at',
        'updated_at'
    ];

    public static function getConditions($query, $params = []) {

        //id
        if(isset($params['id']) && $$params['id']){
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

        //id_no
        if(isset($params['id_no']) && $params['id_no']){
            $query->where('id_no', $params['id_no']);
        }

        //is_id
        if(isset($params['is_id']) && $params['is_id']){
            if(is_array($params['is_id'])){
                $query->whereIn('is_id', $params['is_id']);
            }else{
                $query->where('is_id', $params['is_id']);
            }
        }

        //preparedBy
        if(isset($params['preparedBy']) && $params['preparedBy']){
            $query->where('preparedBy', $params['preparedBy']);
        }

        return $query;
    }

    public static function getTransReturn($params = []) {
        $data = [];

        //default fields
        $fields = isset($params['all_fields']) && $params['all_fields'] ? ['*'] : [
            'id',
            'id_no',
            'is_id',
            'date_returned',
            'preparedBy'
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
