<?php

namespace App\Http\Controllers\API;

use App\Models\Tournament;
use App\Models\TournamentTeam;
use App\Transformers\TournamentTeamTransformer;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Sorskod\Larasponse\Larasponse;
use App\Http\Requests\Tournament\AddTeam;


class TournamentTeamsController extends Controller
{

    public function catalogue()
    {
        $collection = TournamentTeam::with('Team')->where(['tournamentId' => Input::get('tournamentId')]);

        return $this->response->collection($collection->get(), new TournamentTeamTransformer(), 'teams');
    }

    public function add(AddTeam $request)
    {
        $team = TournamentTeam::create($request->input('team'));

        return $this->response->collection(TournamentTeam::where(['id' => $team->id])->get(), new TournamentTeamTransformer(), 'teams');
    }
}
