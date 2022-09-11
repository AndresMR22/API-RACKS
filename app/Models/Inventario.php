<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        "altura",
        "ancho",
        "descripcion",
        "nombre",
        "rack_id",
        "ubicacion_id",
        "estado_espacio"
    ];

    public function ubicacion()
    {
        return $this->belongsTo(UbicacionRack::class)->withTrashed();
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }



}
