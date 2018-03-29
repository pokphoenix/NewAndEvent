<?php

namespace DurianSoftware;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $table = "dim_users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'member_number',
        'password',
        'first_name',
        'last_name',
        'nick_name',
        'image',
        'day_id',
        'month_id',
        'year_id',
        'gender',
        'email',
        'telephone',
        'is_block',
        'google_id',
        'facebook_id',
        'twitter_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getDay()
    {
        return $this->hasOne('DurianSoftware\Models\Day', 'id', 'day_id');
    }

    public function getMonth()
    {
        return $this->hasOne('DurianSoftware\Models\Month', 'id', 'month_id');
    }

    public function getYear()
    {
        return $this->hasOne('DurianSoftware\Models\Year', 'id', 'year_id');
    }
}
