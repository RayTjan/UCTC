<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    public $table = 'uctc_programs';

    protected $fillable= [
        'name',
        'description',
        'status',
        'goal',
        'program_date',
        'program_category_id',
        'program_type_id ',
        'created_by',
        'type',
        'category',
        'note',
        'thumbnail',
    ];
    public function hasPlans(){
        return $this->hasMany(ActionPlan::class, 'program','id');
    }
    public function hasFinances(){
        return $this->hasMany(Finance::class, 'program','id');
    }
    public function hasDocs(){
        return $this->hasMany(Documentation::class, 'program','id');
    }
    public function hasProposals(){
        return $this->hasMany(Proposal::class, 'program','id');
    }
    public function hasReports(){
        return $this->hasMany(Report::class, 'program','id');
    }
    public function hasAttachments(){
        return $this->hasMany(FileAttachment::class, 'program','id');
    }
    public function categorized(){
        return $this->belongsTo(Category::class,'category','id');
    }
    public function classified(){
        return $this->belongsTo(Type::class,'type','id');
    }
    public function creator(){
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function committees(){
        return $this->belongsToMany(User::class,'uctc_program_user','uctc_program_id', 'uctc_user_id')->withTimestamps();
    }
    public function clients(){
        return $this->belongsToMany(Client::class, 'uctc_client_program','uctc_program_id', 'uctc_client_id')->withTimestamps();
    }
}
