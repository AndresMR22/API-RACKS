<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;


    public $fillable=[
        "estado_sensor",
        "posicion",
        "ubicacion_id",
    ];

    // public function ubicacionrack()
    // {
    //     return $this->belongsTo(UbicacionRack::class)->withTrashed();
    // }
}
