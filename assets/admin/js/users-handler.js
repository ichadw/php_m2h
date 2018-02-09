
	'use strict';
	
	var UserHandler = {
		createIt: function(options){
			
			var USERS_ID;
			
			var handler = {
				_initialize: function(){
					var self = this;
					
					self._getUsers();
				},
				
				_getUsers: function(){
					var self = this;
					
					loader.block();
					var success = function(response){
						if(response.status == 'OK'){
							
							var data = response.users_list;
							console.log(row);
							$('#table-list tbody').html(row);
							$('#table-list tbody button.btn-delete[data-id="1"]').hide();
						}else{
							if(typeof response.message != 'undefined'){
								if(response.message.length > 0)
									messageBox(ERROR, response.message);
								else
									messageBox(ERROR, 'Get users failed');
							}
						}
						loader.unblock();
					}
					
					var error = function(response){
						loader.unblock();
						messageBox(ERROR, response.responseText);
					}
					
					var postdata = {
						
					}
					
					AdjRequest.sendApi({
						url: options.baseUrl + 'api/users/getUsersList',
						postdata: postdata,
						success: success,
						error: error
					})
				},
				
				_deleteUsers: function(id){
					var self = this;
					
					var success = function(response){
						if(response.status == 'OK'){
							messageBox(SUCCESS, 'Delete users success');
							self._getUsers();
						}else{
							if(typeof response.message != 'undefined'){
								if(response.message.length > 0)
									messageBox(ERROR, response.message);
								else
									messageBox(ERROR, 'Delete users failed');
							}
						}
						loader.unblock();
					}
					
					var error = function(response){
						loader.unblock();
						messageBox(ERROR, response.responseText);
					}
					
					var postdata = {
						user_id: USERS_ID
					}
					
					AdjRequest.sendApi({
						url: options.baseUrl + 'api/users/deleteUsers',
						postdata: postdata,
						success: success,
						error: error
					});
				},
				
				_clickListener: function(){
					var self = this;
					
					$('#add').on('click', function(){
						location.href = options.baseUrl + 'dup-admin/users/add'
					});
					
					$('.delete-yes').on('click', function(){
						$('.delete-confirmation').modal('hide');
						self._deleteUsers();
					});
					
					$(document).on('click', '#table-list .btn-delete', function(){
						var ctrl = $(this);
						USERS_ID = ctrl.attr('data-id');
						
						$('.delete-confirmation').modal({
							backdrop: 'static',
							keyboard: false
						});
					});
					
					$('#table-list').on('click', '.btn-edit', function(){
						var ctrl = $(this),
							id = ctrl.attr('data-id');
							
						location.href = options.baseUrl + 'dup-admin/users/edit/'+id
					});
				},
				
				init: function(){
					var self = this;
					
					self._initialize();
					self._clickListener();
				}
			}
			
			return handler;
		}
	}