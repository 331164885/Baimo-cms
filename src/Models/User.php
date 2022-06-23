<?php

namespace Baimo\Cms\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lauthz\Facades\Enforcer;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    protected $table = "baimo_users";

    protected $datas = ['deleted_at'];

    protected $fillable = [
        'name', 'avatar', 'email', 'password', 'created_at', 'oauth_id', 'oauth_type'
    ];

    public $appends = [
        'roles', 'introduction'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['role' => 'user'];
    }

    public function getAvatarAttribute($key) {
        if(empty($key)) $key = '/storage/default-avatar.jpg';

        return $key;
    }

    public function getRolesAttribute($key)
    {
        $roles = Enforcer::getRolesForUser($this->id);
        if(!empty($roles)) return explode(',',$roles);

        if(empty($key) && $this->name =='admin' || $this->name='test1') {
            $key = 'admin';
        }
        if(empty($key)) {
            $key='users';
        }
        return $key;
    }

    public function getIntroductionAttribute($key){
        return $key;
    }
}