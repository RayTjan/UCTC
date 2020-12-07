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
        'program_type_id ',
        'created_by'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function committees(){
        return $this->belongsToMany(User::class)->withPivot('is_approved')->withTimestamps();
    }
}
