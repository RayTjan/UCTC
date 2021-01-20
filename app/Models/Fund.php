<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    public $table = 'uctc_disbursement_of_funds';

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
