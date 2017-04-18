<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Record extends Model
{
    protected $table = 'record';
    protected $fillable = ['id'];

    public static function save($request)
    {

    }

}
