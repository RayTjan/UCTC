<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAttachment extends Model
{
    use HasFactory;
    public $table = 'uctc_file_attachments';

    protected $fillable= [
        'name',
        'file_attachment',
        'program',
    ];
}
