<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyecto';
    protected $primaryKey = 'p_id';
    public $timestamps = false;
    protected $fillable = ['p_nom', 'p_des', 'p_est', 'p_fini', 'p_ffin', 'id_usuario', 'id_sucursal'];

    public function sucursal()
    {
        return $this->belongsTo(sucursal::class, 'id_sucursal', 's_id');
    }
}
