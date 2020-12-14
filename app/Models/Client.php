<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'uctc_clients';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
    ];
}
