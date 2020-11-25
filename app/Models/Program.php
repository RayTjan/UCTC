<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'description',
        'status',
        'goal',
        'program_date',
        'program_category_id',
        'program_type_id '
    ];
}
