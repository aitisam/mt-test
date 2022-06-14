<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;

class CustomerController extends Controller
{

    /*
    * Download the sample sql dataset from https://www.mysqltutorial.org/wp-content/uploads/2018/03/mysqlsampledatabase.zip
    * Write controllers to find the first customer who spent more money on orders & the first customer who has highest number of orders.
    * Use Eloquent, Relationships, SQL Query Optimisation methods. Code execution time and the memory used would be assessed here.
    */

	function high_spent () {
		// $time_start = microtime(true); 

		return Customer::leftJoin('orders', function($join){
				$join->on('orders.customerNumber', '=', 'customers.customerNumber');
			})
			->leftJoin('orderdetails', function($join){
				$join->on('orderdetails.orderNumber', '=', 'orders.orderNumber');
			})
			->where('orders.status','=','Shipped')
			->groupBy('orderdetails.orderNumber')
			->orderBy('spent', 'desc')
			->select(
				'customers.customerNumber',
				'customerName',
				// 'orders.orderNumber',
				DB::raw('SUM(orderdetails.quantityOrdered*orderdetails.priceEach) as spent')
			)->first();

		// var_dump($temp);

		// $time_end = microtime(true);

		//dividing with 60 will give the execution time in minutes otherwise seconds
		// $execution_time = ($time_end - $time_start)/60;

		//execution time of the script
		// var_dump('<b>Total Execution Time:</b> '.$execution_time.' Mins');
	}
	function with_most_order_count () {
		// $time_start = microtime(true); 

		return Customer::leftJoin('orders', 'orders.customerNumber', '=', 'customers.customerNumber')
			// ->where('orders.status','=','Shipped')
			->groupBy('orders.customerNumber')
			->orderBy('order_count', 'desc')
			->select(
				'customers.customerNumber',
				'customerName',
				DB::raw('COUNT(orders.orderNumber) as order_count')
			)->first();

		// var_dump($temp);

		// $time_end = microtime(true);

		//dividing with 60 will give the execution time in minutes otherwise seconds
		// $execution_time = ($time_end - $time_start)/60;

		//execution time of the script
		// var_dump('<b>Total Execution Time:</b> '.$execution_time.' Mins');
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
