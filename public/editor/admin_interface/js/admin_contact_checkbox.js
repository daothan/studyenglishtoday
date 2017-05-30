/*Checkbox Modal contactgory*/

/*Show and hide contact button*/

	$('#view_contact').fadeOut(2000);
	$('#edit_contact').fadeOut(2000);
	$('#delete_contact').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_contact').fadeIn(1000);
		$('#edit_contact').fadeIn(1000);
		$('#delete_contact').fadeIn(1000);

	    if (event.target.type !== 'checkbox') {
    		$(':checkbox', this).trigger('click');
    	}
		$('.table tr').on('click', 'input[type=checkbox]', function () {
		  checkBoxes.prop('checked', false);
		  $(this).prop('checked', true);
		});
	    $(this).addClass("selected").siblings().removeClass("selected");
	});


	/*View detail contact*/
	$('#view_contact').click(function(){
		event.preventDefault();
		if(checked==0){
			$('#viewcontact_errorModal').modal('show');
		}
		if(checked==1){
			$('#viewcontactModal').modal('show');
			$('.table input:checkbox:checked').map(function(){
				var searchIDs = [];
				searchIDs.push($(this).val());
				id = searchIDs[0];

				$.ajax({
					url: '/laravel1/admin/contact/detail',
					type: "GET",
					data:{"id":id},
					success:function(result){
						console.log(result);
						$('#view_contact_prior').text(result.prior);
						$('#view_contact_address').text(result.address);
						$('#view_contact_phone').text(result.phone);
						$('#view_contac_email').text(result.email);
						$('#view_contact_hour_week').text(result.hour_week);
						$('#view_contact_hour_weekend').text(result.hour_weekend);

				        var d = new Date();
							var my_date_format = function(input){
							  var d = new Date(Date.parse(input.replace(/-/g, "/")));

							  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

							  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
							  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
							  return (time + " " + date);

						};
						$('#view_contact_created').text(my_date_format(result.created_at));
					}
				})
			})
		}
	})

	/*Add contact*/
	$('#add_contact').click(function(){
		$('#addcontactModal').modal('show');

		$('#validate_add_contact').validate({
			rules:{
				prior_contact:{
					required:true
				},
				address_contact:{
					required:true,
					minlength:10,
					maxlength:100
				},
				phone_contact:{
					required:true,
					minlength:9,
					maxlength:15
				},
				email_contact:{
					required:true,
					email:true
				},
				hour_week_contact:{
					required:true
				},
				hour_weekend_contact:{
					required:true
				}

			},
			submitHandler: function () {
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/laravel1/admin/contact/add',
					type: 'POST',
					data:{
						'prior_contact'           : $('#prior_contact').val(),
						'address_contact'  		  : $('#address_contact').val(),
						'phone_contact'    		  : $('#phone_contact').val(),
						'email_contact'    		  : $('#email_contact').val(),
						'hour_week_contact'       : $('#hour_week_contact').val(),
						'hour_weekend_contact'    : $('#hour_weekend_contact').val()
					},
					success:function(data){
						console.log(data);
						if(data.error_add_contact == true){
							$('.error').hide();
							if(data.messages.prior_contact != undefined){
								$('.error_tittle_add_contact').show().text(data.messages.prior_contact[0]);
							}
						}
						if(data.add_contact == true){
							$('#contact_table').load('/laravel1/admin/contact/show #contact_table');
							setTimeout(function() { $('#addcontactModal').modal('hide');}, 200);
							setTimeout(function(){ $("#add_contact_success").modal('show');},1000);
							setTimeout(function(){ $("#add_contact_success").modal('hide'); },3000);
							setTimeout(function() { window.location.href = "/laravel1/admin/contact/show";}, 4000);
						}
					}
				})
			}
		})
	})

	/*Edit contact*/
	$('#edit_contact').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewcontact_errorModal').modal('show');
		}
		if(checked==1){
			$('#editcontactModal').modal('show');

			$('.table input:checkbox:checked').map(function(){
				var searchIDs = [];
				searchIDs.push($(this).val());
				id = searchIDs[0];

				$.ajax({
					url:'/laravel1/admin/contact/edit',
					type:'GET',
					data:{"id":id},
					success:function(result){
						//console.log(result);
						$('#old_id_contact').val(result.id);
						$('#prior_contact_edit').val(result.prior);
						$('#address_contact_edit').val(result.address);
						$('#phone_contact_edit').val(result.phone);
						$('#email_contact_edit').val(result.email);
						$('#hour_week_contact_edit').val(result.hour_week);
						$('#hour_weekend_contact_edit').val(result.hour_weekend);

						$('#validate_edit_contact').validate({
							rules:{
								prior_contact_edit:{
									required:true
								},
								address_contact_edit:{
									required:true,
									minlength:10,
									maxlength:100
								},
								phone_contact_edit:{
									required:true,
									minlength:9,
									maxlength:15
								},
								email_contact_edit:{
									required:true,
									email:true
								},
								hour_week_contact_edit:{
									required:true
								},
								hour_weekend_contact_edit:{
									required:true
								}
							},
							submitHandler:function(){
								$.ajaxSetup({
								    headers: {
								        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								    }
								});
								$.ajax({
									'url' : '/laravel1/admin/contact/edit',
									'type' :'POST',
									'data': {
										'old_id_contact'			:$('#old_id_contact').val(),
										'prior_contact_edit' 		:$('#prior_contact_edit').val(),
										'address_contact_edit'	    :$('#address_contact_edit').val(),
										'phone_contact_edit'        :$('#phone_contact_edit').val(),
										'email_contact_edit'   	    :$('#email_contact_edit').val(),
										'hour_week_contact_edit'    :$('#hour_week_contact_edit').val(),
										'hour_weekend_contact_edit' :$('#hour_weekend_contact_edit').val()
									},
									success:function(data){
										if(data.error_edit_contact == true){
											$('.error').hide();
											if(data.messages.tittle_contact_edit != undefined){
												$('.error_tittle_edit_contact').show().text(data.messages.tittle_contact_edit[0]);
											}
										}
										if(data.edit_contact==true){
											setTimeout(function() { $('#editcontactModal').modal('hide');}, 200);
											setTimeout(function(){ $("#edit_contact_success").modal('show');},1000);
											setTimeout(function(){ $("#edit_contact_success").modal('hide'); },3000);
											setTimeout(function() { window.location.href = "/laravel1/admin/contact/show";}, 3300);
										}
									}
								})
							}
						})
					}
				})
			})
		}
	})

	/*Delete contact*/
	$('#delete_contact').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewcontact_errorModal').modal('show');
		}
		if(checked==1){
			$('#deletecontactModal').modal('show');
			$(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];
			})
			$.ajax({
				url: '/laravel1/admin/contact/delete',
				type:"GET",
				data: {"id":id},
				success:function(result){
					//console.log(result);
					$('#deletecontactModal').find('#confirmdelete').on('click',function(){
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$.ajax({
							url: '/laravel1/admin/contact/delete',
							method:"POST",
							data: {id:id},
							success:function(){
								$('#deletecontactModal').modal('hide');
								for(var i=0; i<id.length; i++){
									$('tr#'+id+'').css('background-color','#ccc');
									$('tr#'+id+'').fadeOut(1000);

								}
								setTimeout(function() { window.location.href = "/laravel1/admin/contact/show";}, 1000);
							}
						})
					})
				}
			})
		}
	})