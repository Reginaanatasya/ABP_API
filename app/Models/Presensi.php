<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi'; // Specify the table name

    protected $fillable = [
        'nik',
        'tgl_presensi',
        'jam_in',
        'lokasi_in',
    ];

    // Add any additional attributes that should be fillable

    // If you have any relationships with other models, define them here
    // For example, if you have a relationship with a User model:
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
