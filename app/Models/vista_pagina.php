<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vista_pagina extends Model
{
    protected $fillable = ['pagina', 'vistas'];
    protected $table = 'vistas_pagina';
    public $timestamps = false;

    public static function show($pagina)
    {
        $pag = vista_pagina::where('pagina', '=', $pagina)->first();

        if ($pag  != null) {
            $pag->vistas =  $pag->vistas + 1;
            $pag->update();
            return $pag->vistas;
        }
        $newPag = vista_pagina::create(
            [
                'pagina' => $pagina,
                'vistas' => 1
            ]
        );
        return $newPag->vistas;
    }
}
