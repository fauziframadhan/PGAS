<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'employeeid';

    public function department(){
        return $this->belongsTo(Department::class,'departmentid','id');
    }
}