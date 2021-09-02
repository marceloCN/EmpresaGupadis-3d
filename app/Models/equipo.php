<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';
    protected $primaryKey = 'e_id';
    public $timestamps = false;
    protected $fillable = ['e_nom', 'e_pre', 'e_des'];
}
