<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstalacionTipo extends Model {
    use SoftDeletes;

    protected $table = 'instalacion_tipo';
    
    protected $primaryKey = 'instalacion_tipo_id';
}