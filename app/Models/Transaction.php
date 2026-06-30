<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

   protected $fillable = [
    'user_id',
    'event_id',
    'ticket_type',
    'qty',
    'total_price',
    'payment_method',
    'payment_proof',
    'status',
    'ticket_code',
    'is_used'
];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id_event');
    }
}