<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id_event';

    protected $fillable = [
        'id_organizer',
        'nama_event',
        'lokasi',
<<<<<<< HEAD
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
=======
        'gambar'
    ];

>>>>>>> 642f7f51b6efad2093109d584d1e4099f92b7ce2
    public function tikets()
    {
        return $this->hasMany(
            Tiket::class,
            'id_event',
            'id_event'
        );
    }
}