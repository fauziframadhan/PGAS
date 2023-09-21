<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spending extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'employeeid';

    public function employee(){
        return $this->belongsTo(Employee::class,'employeeid','id');
    }
}