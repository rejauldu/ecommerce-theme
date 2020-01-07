<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$orders = Order::all();
		return view('backend.orders.index', compact('user', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
		return view('backend.orders.create', compact('user'));
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
		Order::find($id)->update($data);
		return redirect(route('orders.index'))->with('message', 'Order created successfully');
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
        $order = Order::find($id);
		return view('backend.orders.show', compact('user', 'order'));
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
        $order = Order::find($id);
		return view('backend.orders.create', compact('user', 'order'));
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
		$order = Order::find($id);
		$order->update($data);
		
		return redirect(route('orders.index'))->with('message', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$order = Order::find($id);
		$order->delete();
		return redirect()->back()->with('message', 'Order has been deleted');
    }
	
	public function incomplete()
    {
		$user = Auth::user();
		$orders = Order::where('order_status_id', 2)->get();
		return view('backend.orders.index', compact('user', 'orders'));
    }
}
