<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory;
    public $table = 'uctc_pencairan_danas';

    protected $fillable= [
        'name',
        'value',
        'description',
        'status',
        'note',
        'date',
        'program',
    ];
}
