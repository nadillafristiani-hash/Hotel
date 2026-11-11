<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];
    public function reservations()
    {
        return $this ->hashMany(Reservation::class);
    }
}
