<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporte extends Model
{
    use HasFactory;
    protected $table = 'reporte';
    protected $primaryKey = 'r_id';
    public $timestamps = false;
    protected $fillable = ['r_fecha', 'r_des', 'id_participa'];

    public function participa()
    {
        return $this->belongsTo(participa::class, 'id_participa', 'id_pa');
    }
}
