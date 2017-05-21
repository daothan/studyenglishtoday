
/*Cate script*/
	/*Show Cate informations*/
	function view_cate(id){
	    $('#view_cate').each(function(i){
			id[i] = $(this).val();
			var parent = $('#parent_category').val();
			if(parent==""){
				var parent_cate = "None";
			}else{
				var parent_cate=parent;
			}

			$.ajax({
			    url: '/laravel1/admin/cate/catedetail',
			    type:"GET",
			    data: {"id":id},
			    success: function(result){

			    	if(result.cate_parent.length){
			    		var cate_parent = result.cate_parent[0].name;
			    	}else{
			    		var cate_parent = "None";
			    	}

		    		$('#viewcateModal').modal('show');

			        $("#view_titlename").text(result.info.name);
			        $("#view_catename").text(result.info.name);
			        $("#view_cateorder").text(result.info.order);
			        $("#view_cateparent").text(cate_parent);
			        $("#view_catekeyword").text(result.info.keywords);
			        $("#view_catedescription").text(result.info.description);

			        var d = new Date();
						var my_date_format = function(input){
						  var d = new Date(Date.parse(input.replace(/-/g, "/")));

						  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

						  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
						  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
						  return (time + " " + date);

						};
					$("#view_catecreated").text(my_date_format(result.info.created_at));
			    }
			})
		})
	}

	/*Add Cate*/
	/*Show cate parent and cate*/
    $.ajax({
    	url: '/laravel1/admin/cate/add',
    	type: "GET",
    	success: function(result){
		    //console.log(result.length);
		    /*Level 0*/
		   	if(result.length != 0) {
		    	$.each(result[0].parent, function (index, value1) {
			   		$('#add_parent').append(
			       		$("<option></option>").val(value1.id).text(value1.name));
			   			/*Level 1*/
					    $.each(result[0].category, function(index,value2){
					    	if(value2.parent_id==value1.id){
					    		$('#add_parent').append(
					    			$("<option></option>").val(value2.id).text("--"+value2.name));
					    			/*Level 2*/
					    			$.each(result[0].category, function(index,value3){
					    				//console.log(value3);
								    	if(value3.parent_id==value2.id){
								    		$('#add_parent').append(
								    			$("<option ></option>").val(value3.id).text("----"+value3.name));
								    			/*Level 3*/
								    			$.each(result[0].category, function(index,value4){
								    				//console.log(value4);
											    	if(value4.parent_id==value3.id){
											    		$('#add_parent').append(
											    			$("<option ></option>").val(value4.id).text("------"+value4.name));
											    	}
											    });
								    	}
								    });
					    	}
					    });
				});
		   	}
    	}
    });


	$('#add_cate, #add_cate_header').click(function(){
		$('#addcateModal').modal('show');

		$("#validate_add_cate").validate({
			rules:{
				add_parent:{
					required:true
				},
				add_name:{
					required:true,
					maxlength:50
				},
				add_order:{
					required:true,
					number: true
				},
				add_keywords:{
					required:true,
					minlength:6,
					maxlength:60
				},
				add_description:{
					required:true,
					minlength:6
				}
			},
			submitHandler:function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url  :'/laravel1/admin/cate/add',
					type :'POST',
					data: {
						'add_parent'     : $('#add_parent').val(),
						'add_name'       : $('#add_name').val(),
						'add_order'      : $('#add_order').val(),
						'add_keywords'   : $('#add_keywords').val(),
						'add_description': $('#add_description').val()
					},
					success: function(data){
						if(data.error_add_cate ==true){
						//console.log(data.error_add_cate);
							$('.error').hide();
							if(data.messages.add_name != undefined){
								$('.errorName_add').show().text(data.messages.add_name[0]);
							}
							if(data.messages.add_order != undefined){
								$('.errorOrder_add').show().text(data.messages.add_order[0]);
							}
							if(data.messages.add_keywords != undefined){
								$('.errorKeyword_add').show().text(data.messages.add_keywords[0]);
							}
							if(data.messages.add_description != undefined){
								$('.errorDescription_add').show().text(data.messages.add_description[0]);
							}
						}else{
							setTimeout(function() { $('#addcateModal').modal('hide');}, 200);
							setTimeout(function() { window.location.href = "/laravel1/admin/cate/show";}, 500);
						}
					}
				})
			}
		})
	});

	/*Edit Cate*/
	function edit_cate(id){

	$('#edit_cate').each(function(i){

	    /*Post edit*/
		$.ajax({
			url:'/laravel1/admin/cate/edit',
			type: "GET",
			data:{"id":id},
				success: function(result){
					if(result.erroredit ==true){
						$('#view_error_edit').modal('show');
					}else{
						//console.log(result[0].id_edit.id);
						var id_edit = result[0].id_edit.id;
						$('#editcateModal').modal('show');
						$('#close').click(function(){/*Reload data select*/
							$('#edit_parent').load('/laravel1/admin/cate/show #edit_parent');
						})		

						/*Show category choosing*/
						$('#editcateModal').on('shown.bs.modal', function () {
						 	$('#edit_parent').val(id_edit);
						})

						/*Show categories edit form*/
					    /*Level 0*/
				    	$.each(result[0].parent, function (index, value1) {
					   		$('#edit_parent').append(
					       		$("<option></option>").val(value1.id).text(value1.name));
					   			/*Level 1*/
							    $.each(result[0].category, function(index,value2){
							    	if(value2.parent_id==value1.id){
							    		$('#edit_parent').append(
							    			$("<option></option>").val(value2.id).text("--"+value2.name));
							    			/*Level 2*/
							    			$.each(result[0].category, function(index,value3){
							    				//console.log(value3);
										    	if(value3.parent_id==value2.id){
										    		$('#edit_parent').append(
										    			$("<option></option>").val(value3.id).text("----"+value3.name));
										    			/*Level 3*/
										    			$.each(result[0].category, function(index,value4){
										    				//console.log(value4);
													    	if(value4.parent_id==value3.id){
													    		$('#edit_parent').append(
													    			$("<option ></option>").val(value4.id).text("------"+value4.name));
													    	}
													    });
										    	}
										    });
							    	}
							    });
						});

						/*Send values to edit cate form*/
						//console.log(result[0].info.parent_id);
						$("#old_id_edit").val(result[0].info.id);
						$('#edit_parent').val(result[0].info.parent_id);
						$('#edit_name').val(result[0].info.name);
						$('#edit_order').val(result[0].info.order);
						$('#edit_keyword').val(result[0].info.keywords);
						$('#edit_description').val(result[0].info.description);

						$("#validate_edit_cate").validate({
							rules:{
								edit_order:{
									required:true,
									number: true
								},
								edit_keyword:{
									required:true,
									minlength:6,
									maxlength:60
								},
								edit_description:{
									required:true,
									minlength:6
								}
							},
							submitHandler:function(){
								$.ajaxSetup({
								  headers: {
								    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								  }
								});
								$.ajax({
									'url' : '/laravel1/admin/cate/edit',
									'type' :'POST',
									'data': {
										'old_id_edit':$("#old_id_edit").val(),
										'edit_parent' : $('#edit_parent').val(),
										'edit_name' : $('#edit_name').val(),
										'edit_order' : $('#edit_order').val(),
										'edit_keyword':$('#edit_keyword').val(),
										'edit_description':$('#edit_description').val()
									},
									success: function(data){
										if(data.error_edit_cate ==true){
											$('.error').hide();
											if(data.messages.edit_name != undefined){
												$('.errorName_edit').show().text(data.messages.edit_name[0]);
											}
										}else{
											setTimeout(function() { $('#editcateModal').modal('hide');}, 200);
											setTimeout(function() { window.location.href = "/laravel1/admin/cate/show";}, 500);
										}
									}
								})
							}
						})
					}
				}
			});
		})
	}

	/*Delete Catetegory*/
	function delete_cate(id){
		$('#delete_cate').each(function(i){
			id[i]=$(this).val();

			$.ajax({
				url: '/laravel1/admin/cate/delete_view',
				type:"GET",
				data: {"id":id},
				success:function(result){
					//console.log(result);
					if(result.error_delete_cate==true){
						$('#view_error_delete').modal('show');
					}else{
						$('#deletecateModal').modal('show');
						$('.name_delete_cate').show().text(result.name);

						$('#deletecateModal').find('#confirmdelete').on('click',function(){
							$.ajaxSetup({
							    headers: {
							        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							    }
							});
							$.ajax({
								url: '/laravel1/admin/cate/delete',
								method:"POST",
								data: {id:id},
								success:function(){
									$('#deletecateModal').modal('hide');
									for(var i=0; i<id.length; i++){
										$('tr#'+id+'').css('background-color','#ccc');
										$('tr#'+id+'').fadeOut(1000);

									}
								}
							});
						});

					}
				}
			});
		})
	}

/*<!-- Action -->
<td class="text-center">
	<!-- Show Detail -->
	<button class="btn_admin_action info" data-toggle="modal" data-target="" onclick="view_cate('{{$data["id"]}}')" id="view_cate"><span class="glyphicon glyphicon-list"></span></button>
	<!-- Show Edit Form -->
	<button class="btn_admin_action warning" data-toggle="modal" data-target="" onclick="edit_cate('{{$data["id"]}}')" id="edit_cate"><span class="glyphicon glyphicon-pencil"></span></button>
	<!-- Show Delete Form -->
	<button class="btn_admin_action danger" data-toggle="modal" data-target="" onclick="delete_cate('{{$data["id"]}}')" id="delete_cate"><span class="glyphicon glyphicon-trash"></button>
</td>*/