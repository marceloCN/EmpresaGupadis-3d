<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hormigon extends Model
{
    use HasFactory;
    protected $table = 'hormigon';
    protected $primaryKey = 'h_id';
    public $timestamps = false;
    protected $fillable = ['h_tip','h_nom','h_des','h_pre','id_usuario'];
}
