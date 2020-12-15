<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionPlan extends Model
{
    use HasFactory;
    protected $table = 'uctc_action_plans';

    protected $fillable = [
        'name',
        'description',
        'program',
    ];

    public function plansOf(){
        return $this->belongsTo(Program::class,'program','id');
    }
    public function hasTasks(){
        return $this->hasMany(Task::class, 'action_plan','id');
    }
}
