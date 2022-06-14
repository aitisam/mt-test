<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;


class EmployeeController extends Controller
{
	
	/**
	 * Using collection pipeline programming, find the employee who made
	 * the most valuable sale.
	 *
	 * Do not use any loops, if statements, or ternary operators.
	 * 
	 */
	public function most_valuable_sales () {
		// uri => /api/employee/most_valuable_sales
		$employees = collect([
			[
				'name' => 'John',
				'email' => 'john3@example.com',
				'sales' => [
					['customer' => 'The Blue Rabbit Company', 'order_total' => 7444],
					['customer' => 'Black Melon', 'order_total' => 1445],
					['customer' => 'Foggy Toaster', 'order_total' => 700],
				],
			],
			[
				'name' => 'Jane',
				'email' => 'jane8@example.com',
				'sales' => [
					['customer' => 'The Grey Apple Company', 'order_total' => 203],
					['customer' => 'Yellow Cake', 'order_total' => 8730],
					['customer' => 'The Piping Bull Company', 'order_total' => 3337],
					['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
				],
			],
			[
				'name' => 'Dave',
				'email' => 'dave1@example.com',
				'sales' => [
					['customer' => 'The Acute Toaster Company', 'order_total' => 1091],
					['customer' => 'Green Mobile', 'order_total' => 2370],
				],
			],
		]);
		var_dump(
			$employees->map(function ($item, $key) {
				return [
					'name' => $item['name'],
					'email' => $item['email'],
					'sale_amount' => collect($item['sales'])->max('order_total')
				];
			})->sortByDesc('sale_amount')->first()
		);
		 
		
		/**
		 * Result
		 * 
		 *	array(3) {
		 *		["name"]=>
		 *			string(4) "Jane"
		 *		["email"]=>
		 *			string(17) "jane8@example.com"
		 *		["sale_amount"]=>
		 *			int(8730)
		 *	}
		 */
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
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function show(Employee $employee)
	{
		//
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Employee $employee)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Employee $employee)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Employee $employee)
	{
		//
	}
}
