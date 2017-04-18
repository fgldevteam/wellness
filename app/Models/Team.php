<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = ['id'];

    public static function getTeamMembers($teamId)
    {

    }

    public static function getTeamScore($teamId)
    {

    }


}
