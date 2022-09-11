<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UbicacionRack extends Model
{
    use HasFactory,SoftDeletes;
    public $fillable=[
        "id_rack",
        "posicion",
        "estado_app",
        "rack_id",
        "sensor_id"
    ];


    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }
}
