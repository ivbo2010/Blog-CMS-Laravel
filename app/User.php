<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laratrust\Traits\LaratrustUserTrait;

use Sqits\UserStamps\Concerns\HasUserStamps;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
   // use HasUserStamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'image'
    ];

    protected $appends = ['image_path'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param $value
     *
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);

    }

    /**
     * @param $value
     *
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);

    }

    /**
     * @return string
     */
    public function getImagePathAttribute()
    {
        return asset('uploads/user_images/' . $this->image);

    }

}
