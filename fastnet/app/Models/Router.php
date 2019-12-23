<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Router extends Model {
    use SoftDeletes;

    protected $table = 'routers';
    
    protected $primaryKey = 'router_id';
}