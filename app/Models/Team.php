<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = ['id'];

    public function people()
    {
        return $this->hasMany('App\Models\Person');
    }

    public static function getTeamScore($teamId)
    {

    }


}
