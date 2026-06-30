<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tikets';
    protected $primaryKey = 'id_tiket';
    public $timestamps = false;

    protected $fillable = [
        'id_event',
        'nama_tiket',
        'harga',
        'kuota',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'id_user');
}
}