<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model {
    use HasFactory;

    protected $table = 'penalty_tab';

    protected $primaryKey = 'penalty_id';
    
    protected $fillable = [
        'penalty_name',
        'penalty_charge',
    ];

    // Add this line to disable timestamp columns
    public $timestamps = false;

    public static function getConditions($query, $params = []){

        //penalty_id
        if(isset($params['penalty_id']) && $params['penalty_id']){
            if(is_array($params['penalty_id'])){
                $query->whereIn('penalty_id', $params['penalty_id']);
            }else{
                $query->where('penalty_id', '=', $params['penalty_id']);
            }
        }

        //penalty_name
        if(isset($params['penalty_name']) && $params['penalty_name']) {
            $query->where('penalty_name', '=', $params['penalty_name']);
        }

        return $query; 
    }

    public static function getPenalty($params = []) {
        $data = [];

        $fields = isset($params['all_fields']) && $params['all_fields'] ? ['*'] : [
            'penalty_id',
            'penalty_name',
            'penalty_charge'
        ];

        $query = Self::select($fields);
        $query = Self::getConditions($query, $params);

        //is_multiple
        if(isset($params['is_multiple']) && $params['is_multiple']) {
            //return multiple rows
            $data = $query->get();
            return $data->isNotEmpty() ? $data->toArray() : [];
        }

        //return single row
        $data = $query->first();
        return $data ? $data->toArray() : [];
    }


}


