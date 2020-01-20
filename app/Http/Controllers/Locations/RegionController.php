<?php

namespace App\Http\Controllers\Locations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Locations\Division;
use App\Locations\District;
use App\Locations\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
		$regions = Region::all();
		return view('backend.locations.regions.index', compact('user', 'regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
		$divisions = Division::select('id', 'name')->orderBy('name')->get();
		$districts = District::select('id', 'name', 'division_id')->orderBy('name')->get();
		return view('backend.locations.regions.create', compact('divisions', 'districts', 'user'));
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
		Region::create($data);
		return redirect(route('regions.index'))->with('message', 'Region created successfully');
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
		$region = Region::find($id);
		return view('backend.locations.regions.show', compact('user', 'region'));
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
		$divisions = Division::select('id', 'name')->orderBy('name')->get();
		$districts = District::select('id', 'name', 'division_id')->orderBy('name')->get();
        $region = Region::find($id);
		return view('backend.locations.regions.create', compact('user', 'region', 'divisions', 'districts'));
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
		$region = Region::find($id);
		$region->update($data);
		
		return redirect(route('regions.index'))->with('message', 'Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);
		$region->delete();
		return redirect()->back()->with('message', 'Region has been deleted');
    }
}
