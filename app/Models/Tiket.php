<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $primaryKey = 'id_tiket';
    public $timestamps = false; 

    protected $fillable = [
        'id_event',
        'nama_tiket',
        'harga',
        'kuota',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event', 'id_event');
    }
}