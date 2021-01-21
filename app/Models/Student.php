<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable= [
        'nim',
        'name',
        'email',
        'batch',
        'description',
        'photo',
        'gender',
        'phone',
        'line_account',
        'department_id',
    ];
    public function user(){
        return $this->morphOne(User::class,'identity');
    }
}
