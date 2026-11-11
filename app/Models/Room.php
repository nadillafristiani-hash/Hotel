<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use function PHPSTORM_META\type;

class Room extends Model
{
    protected $guarded = ['id'];
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
