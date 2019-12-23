<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zona extends Model {
    use SoftDeletes;

    protected $table = 'zonas';
    
    protected $primaryKey = 'zona_id';
}