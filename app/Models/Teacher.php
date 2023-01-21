<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    //ONE teacher HAS ONE class
    public function class()
    {
        return $this->hasOne(ClassRoom::class);
    }

}
