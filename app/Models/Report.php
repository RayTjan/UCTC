<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'uctc_reports';

    protected $fillable = [
        'report',
        'status',
        'program',
    ];
}
