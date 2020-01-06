<template>
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
	<div v-for="message in mutable_message_list" class="chat_list col-12" :class="{ 'active_chat': getPartnerId(message) == partner.id}" @click="chatListClick" :partner="getPartner(message).id">
		<div class="chat_people">
			<div class="chat_img"> <img :src="'/assets/profile/'+getPartner(message).photo" alt="sunil"> <i class="fa fa-circle" :class="{'text-success': isOnline(message)}"></i></div>
			<div class="chat_ib">
				<h5>{{ getPartner(message).name }} <span class="chat_date">{{ convertToDate(message.created_at) }}</span></h5>
				<p>{{ message.message }}</p>
				<popover :partner_id="getPartnerId(message)"></popover>
			</div>
		</div>
	</div>
</div>
</template>
<script>
import popover from './PopoverComponent.vue'

export default {
	components: {
		popover
	},
	data () {
		return {
			mutable_message_list: this.message_list,
			users: []
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
				return 'Today';
			}
			return months[date.getMonth()]+' '+date.getDate();
		},
		messageReceived: function(data) {
			let partner_id = this.getPartnerId(data);
			let _this = this;
			let isExist = false;
			for(let i = 0; i<this.mutable_message_list.length; i++) {
				/* Here, the first condition is for the scenerio when a user first time send more than one message to anyone. */
				if(!this.mutable_message_list[i].sender || this.mutable_message_list[i].sender.id == partner_id || this.mutable_message_list[i].receiver.id == partner_id) {
					_this.mutable_message_list[i].id = data.id;
					_this.mutable_message_list[i].message = data.message;
					isExist = true;
					break;
				}
			}
			if(!isExist) {
				this.mutable_message_list.push(data);
			}
			if(this.mutable_message_list.length>1)
				this.mutable_message_list.sort((a, b) => { return b.id - a.id;});
		},
		onlineUpdateUser:function(users) {
			this.users = users;
		},
		isOnline:function(message) {
			let objIndex = this.users.findIndex((obj => obj.id == this.getPartnerId(message)));
			return objIndex > -1 ? true : false;
		},
		getPartner: function(message) {
			if(!message.sender)
				return this.partner;
			if(message.sender.id == this.user.id)
				return message.receiver;
			return message.sender;
		},
		getPartnerId: function(response) {
			if(response.sender_id == this.user.id)
				return response.receiver_id;
			return response.sender_id;
		},
		chatListClick: function(e) {
			let popover = e.target.getAttribute('data-toggle');
			let baseUrl = document.head.querySelector("[name='base-url']").getAttribute('content');
			if(popover !== "popover") {
				window.location.replace(baseUrl+'/chats/'+e.currentTarget.getAttribute('partner'));
			} else {
			
			}
		},
		chatDelete: function(partner) {
			console.log(partner);
			document.getElementById('delete-form').action = '/chats/'+partner;
			document.getElementById('delete-form').submit();
			console.log(partner);
		}
	},
	computed: {
		
	},
	mounted: function() {
		
	},
	created() {
		this.$eventBus.$on('message', this.messageReceived);
		this.$eventBus.$on('users', this.onlineUpdateUser);
	},
	beforeDestroy() {
		this.$eventBus.$off('message');
		this.$eventBus.$off('users');
	},
	props: ['user', 'partner', 'message_list']
}
</script>
<style scoped>
	.chat_list {
		cursor:pointer;
	}
</style>