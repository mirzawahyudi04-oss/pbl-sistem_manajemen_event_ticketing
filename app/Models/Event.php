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
        'deskripsi',
        'tanggal',
        'lokasi',
        'gambar'
    ];

    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'id_event', 'id_event');
    }
}