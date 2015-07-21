<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model {

	protected $table = 'tournaments';

	protected $fillable = ['name', 'description', 'type', 'membersType'];

	public $timestamps = true;

	const MEMBERS_TYPE_SINGLE = 'single';
	const MEMBERS_TYPE_DOUBLE = 'double';

	const TYPE_LEAGUE = 'league';
	const TYPE_KNOCK_OUT = 'knock_out';
	const TYPE_MULTISTAGE = 'multistage';

	public function tournamentTeams()
	{
		return $this->hasMany(TournamentTeam::class, 'tournamentId');
	}

	/**
	 * @return array
	 */
	static public function getAvailableMembersType()
	{
		return [
			self::MEMBERS_TYPE_SINGLE,
			self::MEMBERS_TYPE_DOUBLE,
		];
	}

	/**
	 * @return array
	 */
	static public function getAvailableTypes()
	{
		return [
			self::TYPE_LEAGUE,
			self::TYPE_KNOCK_OUT,
			self::TYPE_MULTISTAGE
		];
	}
}