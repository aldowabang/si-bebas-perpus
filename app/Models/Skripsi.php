<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    /** @use HasFactory<\Database\Factories\SkripsiFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'judul',
        'tahun',
        'jalur_lulus',
        'catatan',
    ];

    /**
     * Get the user that owns the skripsi.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
