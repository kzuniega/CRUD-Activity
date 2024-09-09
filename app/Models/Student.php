<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $table = 'student';
    protected $primaryKey = 'student_id'; 
    public $incrementing = false; 
    protected $keyType = 'int'; 
    protected $fillable = 
    [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'address',
        'gender',
        'birthdate'
    ];
    public function getRouteKeyName() 
    {
        return 'student_id';
    }
}
