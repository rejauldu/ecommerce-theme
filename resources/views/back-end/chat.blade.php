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
			<div class="inbox_chat row">
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
		<div class="mesgs col-12 col-md-8">
			<div class="msg_history">
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>Test which is a new approach to have all solutions</p>
							<span class="time_date"> 11:01 AM | June 9</span>
						</div>
					</div>
				</div>
				<div class="outgoing_msg">
					<div class="sent_msg">
					<p class="bg-theme">Test which is a new approach to have all sol</p>
					<span class="time_date"> 11:01 AM | June 9</span> </div>
				</div>
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>Test, which is a new approach to have</p>
							<span class="time_date"> 11:01 AM | Yesterday</span>
						</div>
					</div>
				</div>
				<div class="outgoing_msg">
					<div class="sent_msg">
						<p>Apollo University, Delhi, India Test</p>
						<span class="time_date"> 11:01 AM | Today</span>
					</div>
				</div>
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p>
							<span class="time_date"> 11:01 AM | Today</span>
						</div>
					</div>
				</div>
				<div class="outgoing_msg">
					<div class="sent_msg">
						<p>Apollo University, Delhi, India Test</p>
						<span class="time_date"> 11:01 AM | Today</span>
					</div>
				</div>
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p>
							<span class="time_date"> 11:01 AM | Today</span>
						</div>
					</div>
				</div>
				<div class="outgoing_msg">
					<div class="sent_msg">
						<p>Apollo University, Delhi, India Test</p>
						<span class="time_date"> 11:01 AM | Today</span>
					</div>
				</div>
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p>
							<span class="time_date"> 11:01 AM | Today</span>
						</div>
					</div>
				</div>
				<div class="outgoing_msg">
					<div class="sent_msg">
						<p>Apollo University, Delhi, India Test</p>
						<span class="time_date"> 11:01 AM | Today</span>
					</div>
				</div>
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p>
							<span class="time_date"> 11:01 AM | Today</span>
						</div>
					</div>
				</div>
				<div class="outgoing_msg">
					<div class="sent_msg">
						<p>Apollo University, Delhi, India Test</p>
						<span class="time_date"> 11:01 AM | Today</span>
					</div>
				</div>
				<div class="incoming_msg">
					<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
					<div class="received_msg">
						<div class="received_withd_msg">
							<p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p>
							<span class="time_date"> 11:01 AM | Today</span>
						</div>
					</div>
				</div>
			</div>
			<div class="type_msg">
				<div class="input_msg_write">
					<input type="text" class="write_msg" placeholder="Type a message" />
					<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
				</div>
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
	var msg_history = document.querySelector('.msg_history');
	msg_history.style.height = (h-49)+'px';
})();
	
</script>
@endsection