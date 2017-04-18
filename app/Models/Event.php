<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['id'];

    public static function getStoreList()
    {

    }
}
