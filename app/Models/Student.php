<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'nim',
        'department',
        'date_of_birth',
        
    ];

    /**
     * Get the skripsi associated with the student.
     */
    public function skripsi(){
        return $this->hasMany(Skripsi::class);
    }

    /**
     * Get the bebasPerpus associated with the student.
     */
    public function bebasPerpus(){
        return $this->hasMany(BebasPerpus::class);
    }
}
