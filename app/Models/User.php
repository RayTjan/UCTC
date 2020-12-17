<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'uctc_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'activation_token',
        'is_login',
        'role_id',
        'is_active',
        'is_verified',    ];

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

    public function identity(){
        return $this->morphTo(__FUNCTION__, 'identity_type', 'identity_id');
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasTasks(){
        return $this->hasMany(Task::class, 'PIC','id');
    }
    public function createProgram(){
        return $this->hasMany(Program::class, 'created_by','id');
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
    public function attends(){
        return $this->belongsToMany(Program::class, 'uctc_program_user','uctc_user_id', 'uctc_program_id')->withPivot('is_approved')->withTimestamps();
    }
    public function isAdmin(){
        if($this->role->name == 'Admin' && $this->is_login == '1' && $this->is_active =='1'&& $this->is_verified =='1'){
            return true;
        }
        return false;
    }
    public function isCreator(){
        if($this->role->name == 'Staff' && $this->is_login == '1' && $this->is_active =='1'&& $this->is_verified =='1'){
            return true;
        }
        return false;
    }
    public function isUser(){
        if($this->role->name == 'User' && $this->is_login == '1'&& $this->is_active =='1'&& $this->is_verified =='1'){
            return true;
        }
        return false;
    }
}

