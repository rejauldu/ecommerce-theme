<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;
use App\User;
use Auth;
use DB;

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
		$partner_id = 1;
		if($chat)
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
		$data = $request->all();
		if($data['type'] == 'text') {
			
			$server_id = rand(100, 1000);
			$data['id'] = $server_id;
			$object = new \stdClass();
			$object->id = 1;
			$object->photo = 'avatar.png';
			$data['sender'] = $object;
			
			$object2 = new \stdClass();
			$object2->id = 6;
			$object2->photo = 'avatar.png';
			$data['receiver'] = $object2;
			$data['created_at'] = 1577542386370;
			broadcast(new \App\Events\PrivateChatEvent($data))->toOthers();
			return '{"client_id":'.$request->id.', "server_id":'.$server_id.', "created_at":1577542386370}';
		} elseif($data['type'] == 'received_notification') {
			$data['sent_at'] = 1577542386399;
			broadcast(new \App\Events\PrivateChatEvent($data))->toOthers();
			return $data;
		} elseif($data['type'] == 'viewed_notification') {
			$data['viewed_at'] = 1577542387000;
			broadcast(new \App\Events\PrivateChatEvent($data))->toOthers();
			return $data;
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		if($id == Auth::user()->id) {
			return redirect(route('chats.index'));
		}
		$user = User::select('id', 'name', 'photo')->where('id', Auth::user()->id)->first();
		$partner = User::select('id', 'name', 'photo')->where('id', $id)->first();
        $messages = Chat::select('id', 'type', 'message', 'sender_id', 'receiver_id', 'sent_at', 'viewed_at', 'created_at')
			->where(function($p) use($id, $user) {
				$p->where('sender_id', $id)
				->where('receiver_id', $user->id);
			})
			->orWhere(function($q) use($id, $user) {
				$q->where('sender_id', $user->id)
				->where('receiver_id', $id);
			})->get();
		$user_id = Auth::user()->id;
		$message_list = Chat::where(function($p) use($user_id) {
				$p->where('sender_id', $user_id)
				->orWhere('receiver_id', $user_id);
			})
			->whereNotIn('deleted_by', [-2, $user_id])
			->whereIn('id', function($query) {
			   $query->from('chats')->groupBy(DB::raw("if(receiver_id>sender_id, receiver_id, sender_id), if(receiver_id>sender_id, sender_id, receiver_id)"))->selectRaw('MAX(id)');
			})
			->orderBy('id', 'desc')
			->with(['sender', 'receiver'])
			->get();
        return view('backend.chats.chat', compact('messages', 'message_list', 'user', 'partner'));
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
        return redirect(route('chats.index'));
    }
}
