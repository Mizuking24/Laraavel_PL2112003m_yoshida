<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Crypt;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    ];

    // 暗号化と複合化の処理
    public function getEmailAttribute($value)
    {
        // return Crypt::decrypt($value);
        $key = "hogehoge";
        return openssl_decrypt($value, 'AES-128-ECB', $key);
    }

    public function setEmailAttribute($value)
    {
        // $this->attributes['email'] = Crypt::encrypt($value);
        $key = "hogehoge";
        $this->attributes['email'] = openssl_encrypt($value, 'AES-128-ECB', $key);
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }
}
