<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Team as Team;
use App\Models\Person as Person;
use App\Models\Event as Event;
use App\Models\Record as Record;
use App\Models\TeamPeople as TeamPeople;

class Controller extends BaseController
{

    public function save()
    {

    }

    public function checkUserLastLoggedIn($id)
    {

    }

    public function getScoreboard()
    {

    }

    public function teamLists()
    {
        $teams = Team::all();

        foreach($teams as $team){
            
            $team->team_people = Team::find($team->id)->people();
            // $TeamPeople = TeamPeople::where('team_id', $team->id)->get();
            //
            // foreach($TeamPeople as $person) {
            //     $p = Person::find($person->person_id);
            //     $teamMembersArray = $team->team_members[];
            //
            // }

        }
        return $teams;
    }

    public function array_insert(&$array, $position, $insert)
    {
        if (is_int($position)) {
            array_splice($array, $position, 0, $insert);
        } else {
            $pos   = array_search($position, array_keys($array));
            $array = array_merge(
                array_slice($array, 0, $pos),
                $insert,
                array_slice($array, $pos)
            );
        }
    }
}
