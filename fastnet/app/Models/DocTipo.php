<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocTipo extends Model {
    use SoftDeletes;

    protected $table = 'doc_tipo';
    protected $primaryKey = 'doc_id';
}