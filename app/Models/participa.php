<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participa extends Model
{
    use HasFactory;
    protected $table = 'participa';
    protected $primaryKey = 'id_pa';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'id_proyecto', 'pa_des'];

    public function usuario_dato()
    {
        return $this->belongsTo(usuario_dato::class, 'id_usuario', 'ud_id');
    }

    public function proyecto()
    {
        return $this->belongsTo(proyecto::class, 'id_proyecto', 'p_id');
    }

    public function reportes()
    {
        return $this->hasMany(reporte::class, 'id_participa', 'id_pa');
    }
}
