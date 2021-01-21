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

    public function attends(){
        return $this->belongsToMany(Program::class, 'uctc_client_program','uctc_client_id','uctc_program_id')->withTimestamps();
    }

}
