<?php

namespace App\Models;

use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
    ];

    public function class()
    {
        return $this->hasOne(ClassRoom::class);
    }
}
