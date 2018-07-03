<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //模型关联 话题
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

     public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    //模型关联 一个用户可能有多个回复
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
