<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Person extends Model
{
    protected $table = 'people';
    protected $fillable = ['id'];

    public static function getStoreList()
    {

    }
}
