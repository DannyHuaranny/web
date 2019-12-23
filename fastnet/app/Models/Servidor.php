<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servidor extends Model {
    use SoftDeletes;

    protected $table = 'servidores';
    
    protected $primaryKey = 'servidor_id';
}