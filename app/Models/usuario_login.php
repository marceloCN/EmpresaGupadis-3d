<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticable;


class usuario_login extends Authenticable
{
    use HasFactory;
    protected $table = "usuario_login";
    protected $primaryKey = 'ul_id';
    protected $guarded = ['ul_id'];
    protected $fillable = ['ul_acc','ul_pass'];
    public $timestamps = false;

    public function usuario_dato()
    {
        return $this->hasOne(usuario_dato::class, 'id_login', 'ul_id');
    }

}
