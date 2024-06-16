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
        'email',
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

        if(isset($params['email'])){
            $conditions[] = ['email', '=', $params['email']];
        }

        // dd(Hash::make($params['password']));
        $fields = ['id','name', 'email', 'password'];

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
}
