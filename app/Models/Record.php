<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Record extends Model
{
    protected $table = 'record';
    protected $fillable = ['id'];

    // public static function save($request)
    // {
    //
    // }

    public function event()
    {
        return $this->hasOne('App\ModelsEvent');
    }

    public function person()
    {
        return $this->hasOne('App\Models\Person');
    }

}
