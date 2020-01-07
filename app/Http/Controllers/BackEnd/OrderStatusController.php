<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\OrderStatus;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$order_statuses = OrderStatus::all();
		return view('backend.order-statuses.index', compact('user', 'order_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
		return view('backend.order-statuses.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $request->except('_token', '_method');
		OrderStatus::find($id)->update($data);
		return redirect(route('order_statuses.index'))->with('message', 'OrderStatus created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user = Auth::user();
        $order_status = OrderStatus::find($id);
		return view('backend.order-statuses.show', compact('user', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = Auth::user();
        $order_status = OrderStatus::find($id);
		return view('backend.order-statuses.create', compact('user', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$data = $request->except('_token', '_method');
		if(!isset($data['is_active'])) {
			$data['is_active'] = 0;
		}
		$order_status = OrderStatus::find($id);
		$order->update($data);
		
		return redirect(route('order_statuses.index'))->with('message', 'OrderStatus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$order_status = OrderStatus::find($id);
		$order->delete();
		return redirect()->back()->with('message', 'OrderStatus has been deleted');
    }
}
