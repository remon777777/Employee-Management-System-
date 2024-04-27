<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
    public function note()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
