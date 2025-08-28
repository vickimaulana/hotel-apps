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

    protected $append = ['isReserved_text', 'isReserved_class'];

    public function getIsReservedClassAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "badge text-bg-success";
                break;
            case '2':
                return "badge text-bg-danger";
                break;

            default:
                return "badge text-bg-warning";
                break;
        }
    }

  public function getIsReservedTextAttribute()
    {
        switch ($this->isReserve) {
            case '1':
                return "Confirm";
                break;
            case '2':
                return "Cancel";
                break;

            default:
                return "Pending";
                break;
        }
    }


    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'id');
    }
}
