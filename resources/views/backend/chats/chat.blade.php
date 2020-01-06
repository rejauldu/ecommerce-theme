@extends('layouts.common')

@section('content')
<div class="content-wrapper">
	<div class="container-fluid">
		@if(session()->has('message'))
		<div class="alert alert-warning">
			{{ session()->get('message') }}
		</div>
		@endif
		<div class="messaging container">
			<div class="inbox_msg row">
				<div class="inbox_people d-none d-md-flex col-md-4">
					<chat-list v-bind:user="{{ $user }}" v-bind:partner="{{ $partner }}" v-bind:message_list="{{ $message_list }}"></chat-list>
				</div>
				<chat v-bind:user="{{ $user }}" v-bind:partner="{{ $partner }}" v-bind:messages="{{ $messages ?? [] }}"></chat>
			</div>
		</div>
	</div>
</div>
@endsection
@section('style')
	<link href="{{ asset('css/chat.css') }}?{{ time() }}" type="text/css" rel="stylesheet">
@endsection
@section('script')
<script>
(function() {
	/*var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);*/
	var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
	var chat_history = document.querySelector('.chat-history');
	chat_history.style.height = (h-104)+'px';
	var chat_inbox = document.querySelector('.chat-inbox');
	chat_inbox.style.height = (h-55)+'px';
})();
	
</script>
@endsection