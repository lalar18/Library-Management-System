<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function checkUser($params){
        $data = [];
        $conditions = [];

        if(isset($params['username'])){
            $conditions[] = ['username', '=', $params['username']];
        }

        // dd(Hash::make($params['password']));
        $fields = ['id','name', 'username', 'password'];

        $data = User::select($fields)->
        where($conditions)->get()->first();

        if(isset($data['password'])){
            if(Hash::check($params['password'], $data['password'])){
                return $data;
            }
        }else{
            return [];
        }
    }


    public static function getUser($params = []) {
        $data = [];     
        $query = User::select(
            'id'
            ,'name'
            ,'username'    
            ,'user_type'
        )
        ->orderBy('name', 'asc');

        if(isset($params['user_id']) && $params['user_id']){
            $query->where('id', '<>', $params['user_id']);
        }

        $data = $query->get()->toArray();
    
        return $data;
    }
}
