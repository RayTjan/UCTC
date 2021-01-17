<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'uctc_proposals';

    protected $fillable = [
        'proposal',
        'status',
        'program',
    ];

    public function belongProgram(){
        return $this->belongsTo(Program::class,'program','id');
    }

}
