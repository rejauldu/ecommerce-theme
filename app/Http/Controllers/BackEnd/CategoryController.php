<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$categories = Category::all();
		return view('backend.categories.index', compact('user', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
		return view('backend.categories.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$file = $request->file('picture');
		$data = $request->except('_token', '_method', 'files', 'picture');
		if($file) {
			$destination_path = 'assets/categories';
			$new_name = $id.'.'.$file->getClientOriginalExtension();
			$file->move($destination_path, $new_name);
			$data['picture'] = $new_name;
		}
		Category::find($id)->update($data);
		return redirect(route('categories.index'))->with('message', 'Category created successfully');
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
        $category = Category::find($id);
		return view('backend.categories.show', compact('user', 'category'));
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
        $category = Category::find($id);
		return view('backend.categories.create', compact('user', 'category'));
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
		$file = $request->file('picture');
		$data = $request->except('_token', '_method', 'files', 'picture');
		$category = Category::find($id);
		if($file) {
			$destination_path = 'assets/categories/';
			$new_name = $id.'.'.$file->getClientOriginalExtension();
			$file->move($destination_path, $new_name);
			$data['picture'] = $new_name;
		}
		$category->update($data);
		return redirect(route('categories.index'))->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$category = Category::find($id);
		$directory = '/assets/categories/';
		File::delete($directory.$category->picture);
		$category->delete();
		return redirect()->back()->with('message', 'Category has been deleted');
    }
}
