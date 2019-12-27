<template>
<div class="mesgs col-12 col-md-8">
	<div class="chat-history">
		<div v-for="message in mutable_messages" v-if="message.receiver_id == user.id"  class="incoming_msg">
			<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
			<div class="received_msg">
				<div class="received_withd_msg">
					<p>{{ message.message }}</p>
					<span class="time_date"> 11:01 AM | June 9</span>
				</div>
			</div>
		</div>
		<div class="outgoing_msg" v-else>
			<div class="sent_msg">
				<p class="bg-theme">{{ message.message }}</p>
				<span class="time_date"> 11:02 AM | June 9</span>
			</div>
		</div>
	</div>
	<div class="type_msg">
		<div class="col-12 d-none" id="chat-whisper" style="background:url('/assets/whisper.gif'); height:30px; background-size:20% 100%; background-repeat: no-repeat"></div>
		<div class="input_msg_write">
			<input id="chat-input" type="text" class="write_msg" placeholder="Type a message" />
			<button id="chat-submit" class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
		</div>
	</div>
</div>
</template>
<script>

export default {
	data () {
		return {
			mutable_messages: this.messages,
			typing: false
		}
	},
	methods: {
		convertToDate: function(d) {
			/* From laravel database field */
			var date = new Date(d);
			var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
			var day = date.getDay();
			var today = new Date();
			if(today.getDate() == date.getDate() && today.getMonth() == date.getMonth() && today.getFullYear() == date.getFullYear()) {
				return 'Today at '+(date.getHours()+today.getTimezoneOffset()/60)+':'+date.getMinutes();
			}
			return date.getDate()+' '+months[date.getMonth()]+' '+(date.getHours()+today.getTimezoneOffset()/60)+':'+date.getMinutes() ;
		},
		scrollToBottom: function() {
			let element = document.querySelector('.chat-history');
			this.$nextTick(function () {
				element.scrollTo(0, element.scrollHeight);
			});
		},
		checkTyping: function() {
			let _this = this;
			let input = document.getElementById("chat-input");
			if(input)
			input.addEventListener("keyup", function(event){
				_this.typing = event.currentTarget.value.length?true:false;
				_this.sendWhisper;
			}, true);
		},
		checkSubmit: function() {
			let _this = this;
			let input = document.getElementById("chat-input");
			let submit = document.getElementById("chat-submit");
			if(input)
			input.addEventListener("keypress", function(event){
				if (event.key === 'Enter') {
				  _this.typing = false;
				  _this.sendText();
				}
			});
			if(submit)
			submit.addEventListener("click", function(event){
				  _this.typing = false;
				  _this.sendWhisper;
				  _this.sendText();
			});
		},
		sendText: function() {
			let input = document.getElementById("chat-input");
			let data;
			if(input) {
				data = {"type":"text", "message":input.value, "sender_id":this.user.id, "receiver_id":this.partner.id};
				this.updateMessage(data);
				input.value='';
			}
			this.sendByAxios(data);
		},
		sendByAxios: function(data) {
			let _this = this;
			axios.post('/chats', data)
				.then(function(response) {
				
				})
				.catch(function(error) {
				});
		},
		updateMessage: function(e) {
			if(e.type == "text") {
				this.mutable_messages.push({"type":e.type, "message":e.message, "sender_id":e.sender_id, "receiver_id":e.receiver_id});
				this.scrollToBottom();
			}
		},
		showWhispering: function(e) {
			let element = document.getElementById('chat-whisper');
			if(element)
			e.type == "whisper-start" ? element.classList.add('d-block') : element.classList.remove('d-block');
		}
	},
	computed: {
		sendWhisper: function() {
			let _this = this;
			let type = this.typing? "whisper-start":"whisper-stop";
			let data = {"type":type, "message":"", "sender_id":this.user.id, "receiver_id":this.partner.id}
			axios.post('/chats', data)
				.then(function(response) {
					
				})
				.catch(function(error) {
					this.typing = false;
				});
		},
	},
	mounted: function() {
		
		this.checkTyping();
		this.checkSubmit();
		if(this.$refs["input"]) this.$refs["input"].focus();
		var _this = this;
		let ids = this.user.id > this.partner.id ? this.partner.id+'.'+this.user.id : this.user.id+'.'+this.partner.id;
		this.channel = Echo.private('chat.'+ids)
			.listen('PrivateChatEvent', (e) => {
				_this.updateMessage(e);
				_this.showWhispering(e);
			});
	},
	props: ['user', 'partner', 'messages']
}
</script>