<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ip extends Model {
    use SoftDeletes;

    protected $table = 'ips_cliente';
    
    protected $primaryKey = 'ip_cliente_id';
}