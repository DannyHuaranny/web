<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model {
    use SoftDeletes;

    protected $table = 'contratos';
    
    protected $primaryKey = 'contrato_id';
}