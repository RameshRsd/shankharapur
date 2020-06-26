<?php

namespace App;

use App\Model\Accommodation;
use App\Model\Admin;
use App\Model\Feature;
use App\Model\Guest;
use App\Model\Room;
use App\Model\RoomCheck;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
    public function admin(){
        return $this->hasOne(Admin::class,'user_id');
    }
    public function guest(){
        return $this->hasOne(Guest::class,'user_id');
    }
    public function rooms(){
        return $this->hasMany(Room::class,'user_id');
    }
    public function roomCheck(){
        return $this->hasMany(RoomCheck::class,'user_id');
    }
    public function accommodations(){
        return $this->hasMany(Accommodation::class,'user_id');
    }
    public function features(){
        return $this->hasMany(Feature::class,'user_id');
    }
}
