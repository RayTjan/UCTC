<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'uctc_tasks';

    protected $fillable = [
        'name',
        'status',
        'description',
        'due_date',
        'action_plan',
        'PIC',
    ];
    public function taskPlan(){
        return $this->belongsTo(ActionPlan::class,'action_plan','id');
    }
    public function pic(){
        return $this->belongsTo(User::class,'PIC','id');
    }
}
