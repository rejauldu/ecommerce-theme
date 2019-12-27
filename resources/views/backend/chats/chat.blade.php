@extends('layouts.common')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
	{{ session()->get('message') }}
</div>
@endif
<div class="messaging container">
	<div class="inbox_msg row">
		<div class="inbox_people d-none d-md-flex col-md-4">
			<div class="chat-inbox row">
				<div class="headind_srch col-12 py-2">
					<div class="srch_bar">
						<div class="stylish-input-group">
							<input type="text" class="search-bar"  placeholder="Search" >
							<span class="input-group-addon">
								<button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
							</span>
						</div>
					</div>
				</div>
				<div class="chat_list col-12 active_chat">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="chat_ib">
							<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
							<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
						</div>
					</div>
				</div>
				<div class="chat_list col-12">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="chat_ib">
							<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
							<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
						</div>
					</div>
				</div>
				<div class="chat_list col-12">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="chat_ib">
							<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
							<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
						</div>
					</div>
				</div>
				<div class="chat_list col-12">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="chat_ib">
							<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
							<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
						</div>
					</div>
				</div>
				<div class="chat_list col-12">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="chat_ib">
							<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
							<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
						</div>
					</div>
				</div>
				<div class="chat_list col-12">
					<div class="chat_people">
						<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
						<div class="chat_ib">
							<h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
							<p>Test, which is a new approach to have all solutions astrology under one roof.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<chat v-bind:user="{{ $user }}" v-bind:partner="{{ $partner }}" v-bind:messages="{{ $messages ?? [] }}"></chat>
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