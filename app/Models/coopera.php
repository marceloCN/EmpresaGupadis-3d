<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coopera extends Model
{
    use HasFactory;
    protected $table = 'coopera';
    protected $primaryKey = 'id_c';
    public $timestamps = false;
    protected $fillable = [
        'id_empresa',
        'id_proyecto',
        'id_material',
        'c_cant',
        'c_pre',
        'c_fen'
    ];

    public function empresa()
    {
        return $this->belongsTo(empresa::class, 'id_empresa', 'em_id');
    }

    public function proyecto()
    {
        return $this->belongsTo(proyecto::class, 'id_proyecto', 'p_id');
    }

    public function material()
    {
        return $this->belongsTo(material::class, 'id_material', 'm_id');
    }
}
