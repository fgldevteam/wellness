<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Carbon\Carbon as Carbon;
use App\Models\Team as Team;
use App\Models\Person as Person;
use App\Models\Event as Event;
use App\Models\Record as Record;
use App\Models\TeamPeople as TeamPeople;


class Controller extends BaseController
{
    public function didUserLoginThisWeek($id)
    {
        $person = Person::find($id);
        if(!$person){
            return "no person " . $id;
        }

        $lastLogged = Carbon::createFromTimestamp(strtotime($person->last_logged));
        $monday = new Carbon('last Monday');
        $nextmonday = new Carbon('next Monday');

        if($lastLogged->between($monday, $nextmonday)){
            return "true";
        } else {
            return "false";
        }
    }

    public function getPlayer($id)
    {
        $score = 0;
        $person = Person::find($id);
        if(!$person){
            return "no person " . $id;
        }
        $records = Record::where('person_id', $id)->get();
        $recordCount = 0;
        foreach($records as $record){
            $points = Event::find($record->event_id)->points;
            $score = $score + $points;
            $recordCount++;
        }
        $person->score = $score;
        $person->record_count = $recordCount;
        return $person;
    }

    public function getPlayerScore($id)
    {
        $score = 0;
        $person = Person::find($id);
        if(!$person){
            return "no person " . $id;
        }
        $records = Record::where('person_id', $id)->get();
        foreach($records as $record){
            $points = Event::find($record->event_id)->points;
            $score = $score + $points;
        }
        return $score;
    }

    public function getTeamScore($id)
    {
        $score = 0;
        $team = Team::find($id);
        if(!$team){
            return "no team " . $id;
        }

        $people = Team::find($team->id)->people;

        foreach($people as $person){
            $records = Record::where('person_id', $person->id)->get();

            foreach($records as $record){
                $points = Event::find($record->event_id)->points;
                $score = $score + $points;
            }
        }
        return $score;
    }

    public function getTeamScoringList($id)
    {
        $team = Team::find($id);
        if(!$team){
            return "no team " . $id;
        }
        $people = Team::find($id)->people;

        foreach($people as $person){
            $records = Record::where('person_id', $person->id)->get();
            $score = 0;
            foreach($records as $record){
                $points = Event::find($record->event_id)->points;
                $score = $score + $points;
            }
            $person->individual_score = $score;
        }
        $team->team_people = $people;
        return $team;
    }

    public function getScoreboard()
    {
        //initialize the score
        $score = 0;
        //get all the teams
        $teams = Team::all();
        //for each team, get all of the records for that Team
        foreach($teams as $team){
            $people = Team::find($team->id)->people;

            foreach($people as $person){
                $records = Record::where('person_id', $person->id)->get();

                foreach($records as $record){
                    $points = Event::find($record->event_id)->points;
                    $score = $score + $points;
                }
            }
            $team->score = $score;
        }
        return $teams;
    }

    public function teamLists()
    {
        $teams = Team::all();
        foreach($teams as $team){
            $team->team_people = Team::find($team->id)->people;
        }
        return $teams;
    }

    public function getTeam($id)
    {
        $team = Team::find($id);
        if(!$team){
            return "no team " . $id;
        }
        $team->team_people = Team::find($id)->people;
        return $team;
    }

    public function playerLeaders()
    {
        $people = Person::all();

        foreach($people as $person){
            $records = Record::where('person_id', $person->id)->get();
            $score = 0;
            foreach($records as $record){
                $points = Event::find($record->event_id)->points;
                $score = $score + $points;
            }
            $person->individual_score = $score;
        }
        return $people->sortByDesc('individual_score')->values()->all();
    }
}
