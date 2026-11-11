<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = ['id'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
