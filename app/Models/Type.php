<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'uctc_types';

    protected $fillable = [
        'name',
    ];

    public function hasProgram(){
        return $this->hasMany(Program::class, 'type','id');
    }
}
