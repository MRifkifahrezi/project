<?php

namespace App\Models;

use App\Models\student;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id',
    ];

    protected $table = 'class';    
    
    public function students()
    {
        return $this->hasMany(student::class, 'class_id', 'id');
    }
    
    public function homeroomTeacher()
    {
        return $this->belongsTo(teacher::class, 'teacher_id', 'id');
    }
}
