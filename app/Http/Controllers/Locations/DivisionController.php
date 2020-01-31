<?php

namespace App\Http\Controllers\Locations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Locations\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = Division::select('id', 'name')->get();
		return $division;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
		return view('backend.locations.divisions.create', compact('user'));
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
		Division::find($id)->update($data);
		return redirect(route('divisions.index'))->with('message', 'Supplier created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $division = Division::select('id', 'name')->where('id', $id)->with('districts', 'regions')->get();
		return $division;
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
        $division = Division::find($id);
		return view('backend.locations.divisions.create', compact('user', 'division'));
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
		$division = Division::find($id);
		$division->update($data);
		
		return redirect(route('divisions.index'))->with('message', 'Division updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);
		$division->delete();
		return redirect()->back()->with('message', 'Division has been deleted');
    }
}
