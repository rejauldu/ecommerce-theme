<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Payment;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		User::ifAdmin();
		$users = User::with('district', 'role')->paginate(50);
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		User::ifAdmin();
        return view('backend.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		User::ifAdminOrUserBy($id);
		$user = User::find($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		User::ifAdminOrUserBy($id);
		$user = User::with('payment')->where('id', $id)->first();
		$payments = Payment::all();
        return view('backend.users.edit', compact('user', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
		User::ifAdminOrUserBy($id);
		$file = $request->file('photo');
		if($file) {
			$destination_path = 'assets/profile';
			$new_name = $id.'.'.$file->getClientOriginalExtension();
			$file->move($destination_path, $new_name);
			User::where('id', $id)->update(['photo'=>$new_name]);
		} elseif($request->password_old) {
			$user = User::find($id);
			if(Hash::check($request->password_old, $user->password)) {
				$user->fill([
					'password' => Hash::make($request->password)
				])->save();
			} else {
				return 'Password did not match';
			}
		} else {
			User::where('id', $id)->update($request->except('_token', '_method', 'password_old', 'password', 'password_confirmation'));
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::ifAdminOrUserBy($id);
		$user = User::find($id);
		$user->delete();
		return redirect()->back()->with('message', 'User has been deleted');
    }
}
