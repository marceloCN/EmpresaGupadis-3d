<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class almacena extends Model
{
    use HasFactory;
    protected $table = 'almacena';
    protected $primaryKey = 'id_a';
    public $timestamps = false;
    protected $fillable = ['id_sucursal', 'id_equipo', 'a_cant', 'a_fecha', 'a_des'];

    public function sucursal()
    {
        return $this->belongsTo(sucursal::class,  'id_sucursal', 's_id');
    }

    public function equipo()
    {
        return $this->belongsTo(equipo::class,  'id_equipo', 'e_id');
    }
}
