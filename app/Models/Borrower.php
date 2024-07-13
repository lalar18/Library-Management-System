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

        $data = $query->get()->toArray();

        return $data;
    }
}
