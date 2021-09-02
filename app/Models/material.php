<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    protected $table = 'material';
    protected $primaryKey = 'm_id';
    public $timestamps = false;
    protected $fillable = ['m_nom', 'm_des'];
}
