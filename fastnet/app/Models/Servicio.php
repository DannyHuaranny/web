<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model {
    use SoftDeletes;

    protected $table = 'servicios';
    
    protected $primaryKey = 'servicio_id';
}