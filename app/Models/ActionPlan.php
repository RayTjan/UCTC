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
        'status',
        'description',
        'due_date',
    ];
}
