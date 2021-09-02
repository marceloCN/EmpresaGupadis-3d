<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    protected $table = 'empresa';
    protected $primaryKey = 'em_id';
    public $timestamps = false;
    protected $fillable = [
        'em_nom',
        'em_ubic',
        'em_des',
        'em_email',
        'em_enc',
        'em_telef'
    ];
}
