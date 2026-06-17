<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'id_organizer',
        'nama_event',
        'lokasi',
        'tanggal',
        'gambar'
    ];

    // Relasi ke Organizer
    public function organizer()
    {
        return $this->belongsTo(
            Organizer::class,
            'id_organizer',
            'id_organizer'
        );
    }

    // Relasi ke Tiket
    public function tikets()
    {
        return $this->hasMany(
            Tiket::class,
            'id_event',
            'id_event'
        );
    }
}