
	'use strict';
	
	var UsersAddEditHandler = {
		createIt: function(options){
			
			var img;
			
			var handler = {
				_inititalize: function(){
					var self = this;
					
				},
				
				_save: function(){
					var self = this;
					
					if($('#username').val().length <= 0){
						$('.username-group').addClass('has-error');
						$('.username-msg').html('Username is required. Please fill it first');
						return false;
					}
					
					if($('#user-id').val().length <= 0){
						if($('#password').val().length <= 0){
							$('.password-group').addClass('has-error');
							$('.password-msg').html('Password is required. Please fill it first');
							return false;
						}
					}
					
					if($('#password').val() != $('#copass').val()){
						$('.copass-group').addClass('has-error');
						$('.copass-msg').html('Password not match. Please fill it first');
						return false;
					}
					
					loader.block();
					var success = function(response){
						if(response.status == 'OK'){
							
							location.href = options.baseUrl + 'dup-admin/users';
						}else{
							if(typeof response.message != 'undefined'){
								if(response.message.length > 0)
									messageBox(ERROR, response.message);
								else
									messageBox(ERROR, 'Save users failed');
							}
						}
						loader.unblock();
					}
					
					var error = function(response){
						loader.unblock();
						messageBox(ERROR, response.responseText);
					}
					
					var postdata = {
						user_id: $('#user-id').val(),
						username: $('#username').val(),
						password: $('#password').val()
					}					
					
					//console.log(postdata);return false;
					
					AdjRequest.sendApi({
						url: options.baseUrl + 'api/users/saveUsers',
						postdata: postdata,
						success: success,
						error: error
					})
				},

				_clickListener: function(){
					var self = this;
					
					$('#username').on('keyup', function(){
						if($(this).val().length > 0){
							$('.username-group').removeClass('has-error');
							$('.username-msg').html('');
						}
					});
					
					$('#form-action').on('submit', function(e){
						e.preventDefault()
						self._save();
					});
					
					$('#cancel').on('click', function(){
						location.href = options.baseUrl + 'dup-admin/users';
					});
				},
				
				init: function(){
					var self = this;
					
					self._inititalize();
					self._clickListener();
				}
			}
			
			return handler;
		}
	}