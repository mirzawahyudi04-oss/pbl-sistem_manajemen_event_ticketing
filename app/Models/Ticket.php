<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'ticket_type',
        'quantity',
        'payment_method',
        'payment_proof',
        'status'
    ];
}