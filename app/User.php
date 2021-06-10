<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;    // Hash:make 를 위한 코드 -> bcrypt 복호화 해제

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'age', 'password', 'team', 'temperature', 'addtemperature', 'isLoggedin', 'sit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'string',
    ];

    // 이 메소드를 override 해야 비밀번호 암호화 해제
    public function getAuthPassword() {
        // bcrypt 비교를 하지 않기 위해 강제로 해시를 생성한다.
        return Hash::make($this->password);
    }
}
