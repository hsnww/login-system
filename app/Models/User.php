<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function messages()
    {
        return $this->belongsToMany('App\Models\Message');
    }



    // user has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function article()
    {
        return $this->hasOne(Article::class);
    }

    // user has many comments
    public function comments()
    {
        return $this->hasMany('App\Comments', 'from_user');
    }


//    public function can_post()
//    {
//
//        if ( Auth()->roles->name == 'author' || Auth()->roles->name == 'admin') {
//            return true;
//        }
//        return false;
//    }



    /**
     * check if the user has a role
     * @param string $role
     * @return boolean
     */
    public function hasAnyRole(string $role){
        return null !== $this->roles()->where('name', $role)->first();
    }
    /**
     * check the user has any given roles
     * @param array $role
     * @return boolean
     */
    public function hasAnyRoles(array $role){
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
}
