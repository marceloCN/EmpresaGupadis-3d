<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_dato extends Model
{
    use HasFactory;
    protected $table = "usuario_dato";
    protected $primaryKey = 'ud_id';
    protected $fillable = [
        'ud_nom',
        'ud_app',
        'ud_ci',
        'ud_sex',
        'ud_dir',
        'ud_telf',
        'ud_email',
        'id_login',
        'id_tipo'
    ];
    public $timestamps = false;

    public function usuario_login()
    {
        return $this->belongsTo(usuario_login::class, 'id_login', 'ul_id');
    }

    public function tipo_usuario()
    {
        return $this->belongsTo(tipo_usuario::class, 'id_tipo', 'tu_id');
    }


}
