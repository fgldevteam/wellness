<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Person extends Model
{
    protected $table = 'people';
    protected $fillable = ['id'];

    public static function getTeamMemebers($teamId)
    {

    }

    public static function getPersonScore($personId)
    {

    }
}
