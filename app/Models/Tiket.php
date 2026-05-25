<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $primaryKey = 'id_tiket';

    protected $fillable = [
        'id_event',
        'nama_tiket',
        'harga',
        'kuota',
    ];

    // Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id_event');
    }
}