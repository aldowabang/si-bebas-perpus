<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BebasPerpus extends Model
{
    /** @use HasFactory<\Database\Factories\BebasPerpusFactory> */
    use HasFactory;

        protected $fillable = [
        'user_id',
        'skripsi_id',
        'status',
        'catatan_admin',
        'tanggal_terbit',
    ];

    /**
     * Get the user that requested the library clearance.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    /**
     * Get the thesis associated with the library clearance.
     */
    public function skripsi()
    {
        return $this->belongsTo(Skripsi::class);
    }
}
