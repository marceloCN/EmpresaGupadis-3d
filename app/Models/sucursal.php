<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal';
    protected $primaryKey = 's_id';
    public $timestamps = false;
    protected $fillable = ['s_nom', 's_ubic', 's_des'];
}
