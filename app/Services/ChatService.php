<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;
use Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$chat = Chat::where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->latest()->first();
		$partner_id = $user->id == $chat->sender_id?$chat->receiver_id:$chat->sender_id;
		return redirect(route('chats.show', $partner_id));
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
		broadcast(new \App\Events\ChatEvent($request->all()))->toOthers();
		return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = Chat::select('type', 'message', 'sender_id', 'receiver_id')->get();
		$user = User::select('id', 'name')->where('id', Auth::user()->id)->first();
		$partner = User::select('id', 'name')->where('id', 2)->first();
        return view('backend.chats.index', compact('messages', 'user', 'partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	// Chat page
	public function chat()
    {
        return view('backend.chats.chat');
    }
}
