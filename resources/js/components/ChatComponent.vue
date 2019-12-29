<template>
<div class="mesgs col-12 col-md-8">
	<div class="chat-history">
		<div v-for="message in mutable_messages" v-if="message.receiver_id == user.id"  class="incoming_msg" :ref="message.id">
			<div class="incoming_msg_img"> <img :src="'/assets/profile/'+partner.photo" alt="sunil"> </div>
			<div class="received_msg">
				<div class="received_withd_msg">
					<p>{{ message.message }}</p>
					<span class="time_date">{{ convertToDate(message.created_at) }}</span>
				</div>
			</div>
		</div>
		<div class="outgoing_msg" v-else  :ref="message.id">
			<div class="sent_msg">
				<p class="bg-theme">{{ message.message }}</p>
				<span class="time_date">{{ convertToDate(message.created_at) }}</span>
				<i v-if="message.viewed_at" class="fa fa-check text-small"></i>
				<i v-else-if="message.sent_at" class="fa fa-check-circle text-small"></i>
				<i v-else-if="message.created_at" class="fa fa-circle-o text-small"></i>
				<i v-else class="fa fa-spinner v-spin text-small"></i>
			</div>
		</div>
	</div>
	<div class="type_msg">
		<div class="col-12 d-none" ref="chat-whisper">Typing... <i class="text-dark fa fa-circle-o-notch fa-spin"></i></div>
		<div class="input_msg_write">
			<input ref="chat-input" type="text" class="write_msg" placeholder="Type a message" />
			<button ref="chat-submit" class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
			if(!d)
				return '';
			var date = new Date(d);
			var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
			var day = date.getDay();
			var today = new Date();
			if(today.getDate() == date.getDate() && today.getMonth() == date.getMonth() && today.getFullYear() == date.getFullYear()) {
				return this.timeFormat(date)+ ' | '+'Today';
			}
			return this.timeFormat(date)+' | '+months[date.getMonth()]+' '+date.getDate();
		},
		timeFormat: function(date) {
			let today = new Date();
			let hours = date.getHours();
			let minutes = date.getMinutes();
			let ampm = hours >= 12 ? 'PM' : 'AM';
			hours = hours % 12;
			hours = hours ? hours : 12;
			/*hours += today.getTimezoneOffset()/60;*/
			minutes = minutes < 10 ? '0'+minutes : minutes;
			let strTime = hours + ':' + minutes + ' ' + ampm;
			return strTime;
		},
		scrollToBottom: function() {
			let element = document.querySelector('.chat-history');
			this.$nextTick(function () {
				element.scrollTo(0, element.scrollHeight);
			});
			this.focusInput();
		},
		focusInput: function() {
			if(this.$refs["chat-input"]) this.$refs["chat-input"].focus();
		},
		checkTyping: function() {
			let _this = this;
			let input = this.$refs["chat-input"];
			if(input)
			input.addEventListener("keyup", function(event){
				_this.typing = event.currentTarget.value.length?true:false;
				//_this.sendWhisper;
			}, true);
		},
		checkSubmit: function() {
			let _this = this;
			let input = this.$refs["chat-input"];
			let submit = this.$refs["chat-submit"];
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
				  //_this.sendWhisper;
				  _this.sendText();
			});
		},
		sendText: function() {
			let input = this.$refs["chat-input"];
			let data;
			let id = this.getMilliSeconds();
			
			if(input) {
				data = {
					"id":id,
					"type":"text",
					"message":input.value,
					"sender_id":this.user.id,
					"receiver_id":this.partner.id
				};
				this.updateMessage(data);
				input.value='';
			}
			this.sendByAxios(data);
		},
		sendByAxios: function(data) {
			let _this = this;
			axios.post('/chats', data)
				.then(function(response) {
					_this.sentToServer(response);
				})
				.catch(function(error) {
				});
		},
		updateMessage: function(e) {
			if(e.type == "text") {
				this.$eventBus.$emit('message', e);
				if(e.sender_id != this.user.id && e.sender_id != this.partner.id) {
					return;
				}
				this.mutable_messages.push({
					"id":e.id,
					"type":e.type,
					"message":e.message,
					"sender_id":e.sender_id,
					"receiver_id":e.receiver_id,
					"created_at":e.created_at
				});
				this.scrollToBottom();
			} else if(e.type == "received_notification") {
				this.updateReceivedNotification(e);
			} else if(e.type == "viewed_notification") {
				this.updateViewedNotification(e);
			}
		},
		sentToServer: function(response) {
			let objIndex = this.mutable_messages.findIndex((obj => obj.id == response.data.client_id));
			this.mutable_messages[objIndex].created_at = response.data.created_at;
			this.mutable_messages[objIndex].id = response.data.server_id;
			this.scrollToBottom();
		},
		sendReceivedNotification: function(message) {
			if(message.type == 'text') {
				let data = {
					"id":message.id,
					"type":"received_notification",
					"sender_id":message.receiver_id,
					"receiver_id":message.sender_id,
				};
				this.sendByAxios(data);
			}
		},
		updateReceivedNotification: function(response) {
			let objIndex = this.mutable_messages.findIndex((obj => obj.id == response.id));
			/* sent_at is new property; thats why $set method */
			this.$set(this.mutable_messages[objIndex], 'sent_at', response.sent_at);
		},
		sendViewedNotification: function(message) {
			let data = {
				"id":message.id,
				"type":"viewed_notification",
				"sender_id":message.receiver_id,
				"receiver_id":message.sender_id
			};
			this.sendByAxios(data);
		},
		updateViewedNotification: function(response) {
			for(let i=0; i<this.mutable_messages.length; i++) {
				this.$set(this.mutable_messages[i], 'viewed_at', /*response.viewed_at*/true);
			}
		},
		pageVisitAllView: function() {
			let _this = this;
			let data = {
				"id":0,
				"sender_id":_this.partner.id,
				"receiver_id":_this.user.id
			};
			this.sendViewedNotification(data);
		},
		showWhispering: function(e) {
			let element = this.$refs['chat-whisper'];
			if(element)
				e.type == "whisper-start" ? element.classList.add('d-block') : element.classList.remove('d-block');
		},
		getMilliSeconds: function() {
			return (new Date()).getTime();
		},
		isElementVisible: function(el) {
			let rect = el.getBoundingClientRect(), top = rect.top, height = rect.height, parent = el.parentNode;
			do {
				rect = parent.getBoundingClientRect();
				if (top <= rect.bottom === false) return false;
				if ((top + height) <= rect.top) return false
				parent = parent.parentNode;
			} while (parent != document.body);
			return top <= document.documentElement.clientHeight;
		},
		attachEvent: function(element, event, callbackFunction) {
			if (element.addEventListener) {
				element.addEventListener(event, callbackFunction, false);
			} else if (element.attachEvent) {
				element.attachEvent('on' + event, callbackFunction);
			}
		},
		onScrollUpdate: function(){
			if(document.hasFocus() && this.lastMessage && this.lastMessage.sender_id!=this.user.id && !this.lastMessage.viewed_at && this.isElementVisible(this.$refs[this.lastMessage.id][0])) {
				this.lastMessage.viewed_at = this.getMilliSeconds();
				this.sendViewedNotification(this.lastMessage);
			}
		},
		isMessageViewed: function() {
			this.attachEvent(document.querySelector('.chat-history'), "scroll", this.onScrollUpdate);
			window.addEventListener('focus', this.onScrollUpdate);
			this.attachEvent(window, "resize", this.onScrollUpdate);
			this.onScrollUpdate();
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
		lastMessage: function() {
			return this.mutable_messages[this.mutable_messages.length-1];
		}
	},
	mounted: function() {
		this.checkTyping();
		this.checkSubmit();
		this.isMessageViewed();
		this.focusInput();
		this.pageVisitAllView();
		var _this = this;
		this.channel = Echo.private('Chat.'+_this.user.id)
			.listen('PrivateChatEvent', (e) => {
				_this.updateMessage(e);
				_this.sendReceivedNotification(e);
				_this.showWhispering(e);
			});
	},
	props: ['user', 'partner', 'messages', 'message_list']
}
</script>
<style>

</style>