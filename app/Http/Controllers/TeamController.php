<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

/*
 * Using collection pipeline programming, calculate ranks for the given teams based on their respective scores. Same scores should be ranked equally
 * If multiple teams get the same rank, the next ranks should be skipped based on the team count.
 * e.g. If Team B & C gets second rank, 3rd rank should skipped & the team eligible for the 3rd rank should be given 4th rank.
 *
 * Do not use any loops, if statements, or ternary operators.
 */
	public function calculate_ranks () {

		$scores = collect ([
			['score' => 76, 'team' => 'A'],
			['score' => 62, 'team' => 'B'],
			['score' => 82, 'team' => 'C'],
			['score' => 86, 'team' => 'D'],
			['score' => 91, 'team' => 'E'],
			['score' => 67, 'team' => 'F'],
			['score' => 67, 'team' => 'G'],
			['score' => 82, 'team' => 'H'],
		]);
		$i = 0;
		return 
			$scores
			->sortByDesc('score')
			->map(function ($item, $key) use (&$i) {
					$item['rank'] = ++$i;
					return $item;		
				})->groupBy('score')->values()
				->map(function ($item, $key) {
					return [
						'rank' => $item->sortBy('rank')->first()['rank'],
						'teams' => $item->map(
							function ($team) {
								return [
									'team' => $team['team'],
									'score' => $team['score']
								];
							}
						)
					];
				})
				->toArray();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Team  $team
	 * @return \Illuminate\Http\Response
	 */
	public function show(Team $team)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Team  $team
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Team $team)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Team  $team
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Team $team)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Team  $team
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Team $team)
	{
		//
	}
}
