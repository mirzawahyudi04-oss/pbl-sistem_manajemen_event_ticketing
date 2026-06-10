<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $primaryKey = 'id_organizer';

    protected $fillable = [
        'id_user',
        'nama_organizer',
        'kontak',
        'status'
        
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relasi ke Event
    public function events()
    {
        return $this->hasMany(Event::class, 'id_organizer', 'id_organizer');
    }
}