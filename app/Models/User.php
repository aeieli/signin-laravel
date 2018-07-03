<?php

namespace App\Models;

use App\Models\CheckIn;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'user_id';

    // 修改保护变量
    // public function setTableName($string){
    //     $this->table = $string;
    // }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'user', 'hash', 'ture_name', 'phone', 'status', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function unsetSercetInfo()
    {
        unset($this->rules);
        unset($this->idcode);
        unset($this->hash);

    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function CheckIn(){
        return $this->hasMany(CheckIn::class,"user_id","user_id");
    }

    public function order(){
        return $this->hasMany(Device::class,"user_id","user_id");
    }

    public function package(){
        return $this->hasManyThrough(Order::class,Package::class,"user_id","order_id","order_id","package_id");
    }

    // public function shareRecord(){
    //     return $this->hasManyThrough(Record::class,ShareDevice::class,"user_id","device_id","user_id","device_id");

    // }
}
