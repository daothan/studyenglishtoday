

/*Checkbox Modal Detail*/
	/*
	$('#guideModal').modal('show');
	setTimeout(function(){
        $("#openModal").modal('show');
    },1500);
	setTimeout(function(){
        $("#openModal").modal('hide');
    },5000);*/

	$('#view_detail').fadeOut(2000);
	$('#edit_detail').fadeOut(2000);
	$('#delete_detail').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_detail').fadeIn(1000);
		$('#edit_detail').fadeIn(1000);
		$('#delete_detail').fadeIn(1000);

	    if (event.target.type !== 'checkbox') {
    		$(':checkbox', this).trigger('click');
    	}
		$('.table tr').on('click', 'input[type=checkbox]', function () {
		  checkBoxes.prop('checked', false);
		  $(this).prop('checked', true);
		});
	    $(this).addClass("selected").siblings().removeClass("selected");
	});


/*Function use ckeditor and ckfinder*/
function ckeditor(name, config, toolbar){

	config = {};
	config.entities_latin = false;
	config.filebrowserBrowseUrl ='/laravel1/public/editor/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/laravel1/public/editor/ckfinder/ckfinder.html';


	if(toolbar == 'standard'){
		config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		'/',
		'/',
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Source,Save,NewPage,Print,Templates,Copy,Paste,PasteText,PasteFromWord,Replace,SelectAll,Scayt,Form,Radio,TextField,Textarea,Button,Subscript,Superscript,CopyFormatting,RemoveFormat,NumberedList,BulletedList,Outdent,Indent,CreateDiv,Blockquote,JustifyRight,BidiLtr,BidiRtl,Language,Unlink,Anchor,TextColor,BGColor,Maximize,ShowBlocks,About,Cut,Checkbox,HiddenField,ImageButton,Select';

	}if(toolbar =='basic'){
		config.toolbarGroups = [
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];

		config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,Find,Replace,SelectAll,Scayt,Form,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Blockquote,Indent,CreateDiv,JustifyRight,BidiLtr,BidiRtl,Language,Unlink,Anchor,Flash,Image,Table,Smiley,SpecialChar,PageBreak,Iframe,TextColor,BGColor,ShowBlocks,About,Maximize,PasteFromWord,Checkbox,HorizontalRule';


	}if(toolbar == 'full'){
		config.toolbarGroups = [
			{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			{ name: 'forms', groups: [ 'forms' ] },
			'/',
			{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			{ name: 'links', groups: [ 'links' ] },
			{ name: 'insert', groups: [ 'insert' ] },
			'/',
			{ name: 'styles', groups: [ 'styles' ] },
			{ name: 'colors', groups: [ 'colors' ] },
			{ name: 'tools', groups: [ 'tools' ] },
			{ name: 'others', groups: [ 'others' ] },
			{ name: 'about', groups: [ 'about' ] }
		];
	}

	return  CKEDITOR.replace(name, config, toolbar);
}


/*Show editor and ckfinder on Modal*/
//console.log('#tittle'.length);
if($('#tittle').length){
	ckeditor("tittle", "config", "basic")
	ckeditor("introduce", "config", "standard")
	ckeditor("content", "config", "standard")
}
if($('#edit_tittle').length){
	ckeditor("edit_tittle", "config", "basic")
	ckeditor("edit_introduce", "config", "standard")
	ckeditor("edit_content", "config", "standard")
}

$.fn.modal.Constructor.prototype.enforceFocus = function () {
    modal_this = this
    $(document).on('focusin.modal', function (e) {
        if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
        // add whatever conditions you need here:
        &&
        !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
            modal_this.$element.focus()
        }
    })
};

/*Show Detail Content*/
	var id="";
	$("#view_detail").click(function(event){
	    event.preventDefault();
		if(checked==0){
			$('#viewdetail_errorModal').modal('show');
		}
		if(checked==1){
			$('#viewdetailModal').modal('show');
		    $(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];
			    	$.ajax({
			    		url:'/laravel1/admin/detail/content',
			    		type: "GET",
			    		data: {"id":id,},
			    		success:function(result){
			    			$('#viewdetailModal').modal('show');

			    			$('#detail_tittle').html(result.tittle);
			    			$('#detail_introduce').html(result.introduce);
			    			$('#detail_content').html(result.content);
			    		}
			    	})
			    })
			}
	    })


/*Add Detail*/
/*Show cate parent and cate*/
    $.ajax({
    	url: '/laravel1/admin/detail/add',
    	type: "GET",
    	success: function(result){
		    //console.log(result.length);
		    /*Level 0*/
		   	if(result.length != 0) {
		    	$.each(result[0].parent, function (index, value1) {
			   		$('#category').append(
			       		$("<option></option>").val(value1.id).text(value1.name));
			   			/*Level 1*/
					    $.each(result[0].category, function(index,value2){
					    	if(value2.parent_id==value1.id){
					    		$('#category').append(
					    			$("<option></option>").val(value2.id).text("--"+value2.name));
					    			/*Level 2*/
					    			$.each(result[0].category, function(index,value3){
					    				//console.log(value3);
								    	if(value3.parent_id==value2.id){
								    		$('#category').append(
								    			$("<option ></option>").val(value3.id).text("----"+value3.name));
								    			/*Level 3*/
								    			$.each(result[0].category, function(index,value4){
								    				//console.log(value4);
											    	if(value4.parent_id==value3.id){
											    		$('#category').append(
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
/*Validate form and add*/
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
	$('#add_detail').click(function(){

		$('#adddetailModal').modal('show');

		$('#validate_add_detail').validate({
			ignore: [],/*ignore hidden field*/
			rules:{
				category:{
					required:true
				},
	            tittle: {
	            	required  :true,
	            	minlength :20
	            },
				introduce:{
					required  :true,
					minlength :30
				},
				content:{
					required  :true,
					minlength :30
				}
			},
			submitHandler: function () {
	        	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/laravel1/admin/detail/add',
					type: 'POST',
					data:{
						'category'  : $('#category').val(),
						'tittle'    : $('#tittle').val(),
						'introduce' : $('#introduce').val(),
						'content'   : $('#content').val()
					},
					success:function(data){
						if(data.error_add_detail ==true){
						//console.log(data.messages.tittle[0]);
							$('.error').hide();
							if(data.messages.tittle != undefined){
								$('.errorTittle_add').show().text(data.messages.tittle[0]);
							}
						}else{
							$('#detail_table').load('/laravel1/admin/detail/show #detail_table');
							setTimeout(function() { $('#adddetailModal').modal('hide');}, 200);
							setTimeout(function(){
						        $("#add_detail_success").modal('show');
						    },1000);
							setTimeout(function(){
						        $("#add_detail_success").modal('hide');
						    },3000);
							setTimeout(function() { window.location.href = "/laravel1/admin/detail/show";}, 4500);
						}
					}
				})
	    	}
		});
	});

	/*Edit Detial*/
	$("#edit_detail").click(function(event){
	    event.preventDefault();
	    if(checked==0){
			$('#viewdetail_errorModal').modal('show');
		}
		if(checked==1){
			$('#editdetailModal').modal('show');
		    $(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];

		    	$.ajax({
				url:'/laravel1/admin/detail/edit',
				type: "GET",
				data:{"id":id},
					success: function(result){
						/*Show category choosing*/
						var id_edit = result[0].id_edit.id;
						$('#editdetailModal').on('shown.bs.modal', function(){
						 	$('#edit_category').val(id_edit);
						})

						/*Show categories edit form*/
					    /*Level 0*/
				    	$.each(result[0].parent, function (index, value1) {
					   		$('#edit_category').append(
					       		$("<option></option>").val(value1.id).text(value1.name));
					   			/*Level 1*/
							    $.each(result[0].category, function(index,value2){
							    	if(value2.parent_id==value1.id){
							    		$('#edit_category').append(
							    			$("<option></option>").val(value2.id).text("--"+value2.name));
							    			/*Level 2*/
							    			$.each(result[0].category, function(index,value3){
							    				//console.log(value3);
										    	if(value3.parent_id==value2.id){
										    		$('#edit_category').append(
										    			$("<option></option>").val(value3.id).text("----"+value3.name));
										    			/*Level 3*/
										    			$.each(result[0].category, function(index,value4){
										    				//console.log(value4);
													    	if(value4.parent_id==value3.id){
													    		$('#edit_category').append(
													    			$("<option ></option>").val(value4.id).text("------"+value4.name));
													    	}
													    });
										    	}
										    });
							    	}
							    });
						});

						/*Send values to edit cate form*/
						//console.log(result[0].info_detail);
						$('#old_id_edit_detail').val(result[0].info_detail.id);
						CKEDITOR.instances['edit_tittle'].setData(result[0].info_detail.tittle);
						CKEDITOR.instances['edit_introduce'].setData(result[0].info_detail.introduce);
						CKEDITOR.instances['edit_content'].setData(result[0].info_detail.content);

						/*Validate and edit data*/
						$('#validate_edit_detail').validate({
							ignore:[], /*ignore hidden field*/
							rules:{
								edit_category:{
									required:true
								},
								edit_tittle:{
									required:true,
									minlength:20
								},
								edit_introduce:{
									required:true,
									minlength:30
								},
								edit_content:{
									required:true,
									minlength:30
								}
							},
							submitHandler: function(){
								$.ajaxSetup({
								    headers: {
								        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								    }
								});
								$.ajax({
									'url' : '/laravel1/admin/detail/edit',
									'type' :'POST',
									'data': {
										'old_id_edit_detail'    : $('#old_id_edit_detail').val(),
										'edit_category'  		: $('#edit_category').val(),
										'edit_tittle'    		: $('#edit_tittle').val(),
										'edit_introduce' 		: $('#edit_introduce').val(),
										'edit_content'   		: $('#edit_content').val()
									},
									success: function(data){
										if(data.error_edit_detail ==true){
											$('.error').hide();
											if(data.messages.edit_tittle != undefined){
												$('.errorTittle_edit').show().text(data.messages.edit_tittle[0]);
											}
										}else{
										    $('#detail_table').load('/laravel1/admin/detail/show #detail_table');
											setTimeout(function() { $('#editdetailModal').modal('hide');}, 200);
											setTimeout(function(){
										        $("#edit_detail_success").modal('show');
										    },1000);
											setTimeout(function(){
										        $("#edit_detail_success").modal('hide');
										    },3000);
											setTimeout(function() { window.location.href = "/laravel1/admin/detail/show";}, 4500);
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

/*Delete detail*/
$('#delete_detail').click(function(event){
	event.preventDefault();
	if(checked==0){
		$('#viewdetail_errorModal').modal('show');
	}
	if(checked==1){
		$(".table input:checkbox:checked").map(function(){
    	var searchIDs = [];
        searchIDs.push($(this).val());
    	//console.log(searchIDs[0]);
    	id = searchIDs[0];
    		$('#deletedetailModal').modal('show');
			$.ajax({
				url: '/laravel1/admin/detail/delete_view',
				type:"GET",
				data: {"id":id},
				success:function(result){
					$('#deletecateModal').modal('show');
					$('.name_delete_detail').show().html(result.tittle);
					//console.log(result);
					$('#deletedetailModal').find('#confirmdelete').on('click',function(){
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$.ajax({
							url: '/laravel1/admin/detail/delete',
							method:"POST",
							data: {id:id},
							success:function(){
								for(var i=0; i<id.length; i++){
									$('tr#'+id+'').css('background-color','#ccc');
									$('tr#'+id+'').fadeOut(1000);

								}
								setTimeout(function() { window.location.href = "/laravel1/admin/detail/show";}, 1200);
							}
						});
					})
				}
			})
		})
    }
})