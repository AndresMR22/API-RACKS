<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rack extends Model
{
    use HasFactory,SoftDeletes;

    public $fillable = [
        "fila",
        "columna",
    ];

    // public function ubicaciones()
    // {
    //     return $this->hasMany(UbicacionRack::class);
    // }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }

}
