<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable= [
        'nip',
        'name',
        'email',
        'description',
        'photo',
        'gender',
        'phone',
        'line_account',
        'department_id',
        'title_id',

    ];
    public function user(){
        return $this->morphOne(User::class,'identity');
    }
}
