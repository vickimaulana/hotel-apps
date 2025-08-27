<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'guest_name',
        'guest_phone',
        'guest_email',
        'guest_room_number',
        'guest_note',
        'guest_qty',
        'guest_check_in',
        'guest_check_out',
        'guest_id_card',
        'room_id',
        'payment_method',
        'reservation_number',
        'guest_status',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalAmount',
    ];
}
