<template>
<span class="chat-popover">
    <a href="#" class="fa fa-ellipsis-h" :class="'partner-'+partner_id" data-toggle="popover" title="Settings" data-placement="left"></a>
</span>
</template>
 
<script>
    export default {
		data() {
			return {
				
			}
		},
		methods: {
			setContent: function() {
				let _this = this;
				$('[data-toggle="popover"].partner-'+this.partner_id).popover({html:true, content:_this.popoverContent});
			}
		},
		computed: {
			popoverContent: function() {
				return '<div class="list-group">'
					+'<a href="/chats/delete/'+this.partner_id+'" class="list-group-item list-group-item-action">Delete</a>'
					+'<a href="/chats/block/'+this.partner_id+'" class="list-group-item list-group-item-action">Block</a>'
				+'</div>';
			},
			jqueryInitialize: function() {
				$(window).on('click', function (e) {
					if ($(e.target).data('toggle') !== 'popover' && $(e.target).parents('.popover.in').length === 0) { 
						$('[data-toggle="popover"]').popover('hide');
					}
				});
			}
		},
		mounted: function() {
			this.jqueryInitialize;
			this.setContent();
		},
		props: ['partner_id']
    }
</script>
<style>
	.chat_list .chat-popover {
		visibility:hidden;
	}
	.chat_list:hover .chat-popover {
		visibility:visible;
	}
	.popover-body {
		padding:0;
	}
</style>