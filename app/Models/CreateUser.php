<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends Model
{
    use HasFactory;
    protected $fillable=[

        'id',
        'user_id',
        'faculty_id',
        'department_id'
 
     ];
 
     public function user(){
         return $this->belongsTo(User::class, 'user_id', 'id');
     }
 
     public function faculty(){
         return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
     }
 
     public function department(){
         return $this->belongsTo(Department::class, 'department_id', 'id');
     }
}
