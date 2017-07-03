	$('#view_file').fadeOut(2000);
	$('#edit_file').fadeOut(2000);
	$('#delete_file').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_file').fadeIn(1000);
		$('#edit_file').fadeIn(1000);
		$('#delete_file').fadeIn(1000);

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
	config.filebrowserBrowseUrl ='/studyenglishtoday/public/editor/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/studyenglishtoday/public/editor/ckfinder/ckfinder.html';
	config.extraPlugins = 'youtube';


	if(toolbar == 'standard'){
		config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		'/',
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		'/',
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Save,NewPage,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,Scayt,Subscript,Superscript,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Unlink,Maximize,ShowBlocks,About';
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
if($('#tittle_file').length){
	ckeditor("content_file", "config", "basic")
}
if($('#tittle_file_edit').length){
	ckeditor("content_file_edit", "config", "basic")
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

for (instance in CKEDITOR.instances) {
    CKEDITOR.instances[instance].updateElement();
}
/*Add listening*/
	$('#add_file').click(function(){
		$('#addfileModal').modal('show');

		/*Validate form and add*/
			$('#validate_add_file').validate({
				ignore: [],/*ignore hidden field*/
				rules:{
					tittle_file:{
						required:true
					},
					content_file:{
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
					    url: '/studyenglishtoday/admin/text_file/add',
					    type: "POST",
					    data:{
					    	'tittle_file':$('#tittle_file').val(),
					    	'content_file':$('#content_file').val()
					    },
					    beforeSend: function(){
					        $('#loading_add_file').show();
				    	},
			   		   	complete: function(){
				    	    $('#loading_add_file').hide();
				    	},
					    success: function (data) {
							if(data.error_add_file == true){
								$('.error').hide();
								if(data.messages.tittle_file != undefined){
									$('.errorTittle_add').show().text(data.messages.tittle_file[0]);
								}
							}
							if(data.success_add_file == true){
								$('#file_table').load('/studyenglishtoday/admin/text_file/show #file_table');
								setTimeout(function() { $('#addfileModal').modal('hide');}, 200);
								setTimeout(function(){ $("#add_file_success").modal('show');},1000);
								setTimeout(function(){ $("#add_file_success").modal('hide'); },3000);
								setTimeout(function() { window.location.href = "/studyenglishtoday/admin/text_file/show";}, 3200);
							}
					    },
					})
		    	}
			});
	})

/*View Content*/
	var id="";
	$("#view_file").click(function(event){
    event.preventDefault();

	if(checked==1){
	    $(".table input:checkbox:checked").map(function(){
	    	var searchIDs = [];
	        searchIDs.push($(this).val());
	    	//console.log(searchIDs[0]);
	    	id = searchIDs[0];
		    	$.ajax({
		    		url:'/studyenglishtoday/admin/text_file/detail',
		    		type: "GET",
		    		data: {"id":id,},
		    		success:function(result){
		    			//console.log(result);
		    			$('#vieweditModal').modal('show');

		    			$('#file_tittle').html(result.tittle);
		    			$('#file_content').html(result.content);
		    		}
		    	})
		    })
		}
    })

/*Edit Audio*/
$("#edit_file").click(function(event){
	    event.preventDefault();
		if(checked==1){
			$('#editfileModal').modal('show');
		    $(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];

		    	$.ajax({
				url:'/studyenglishtoday/admin/text_file/edit',
				type: "GET",
				data:{"id":id},
					success: function(result){
						//console.log(result);
						$('#old_id_file').val(result.id);
						$('#tittle_file_edit').val(result.tittle);
						CKEDITOR.instances['content_file_edit'].setData(result.content);

						/*Validate and edit data*/
						$('#validate_edit_file').validate({
							ignore:[], /*ignore hidden field*/
							rules:{
								tittle_file_edit:{
									required:true
								},
								content_file_edit:{
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
								    url: '/studyenglishtoday/admin/text_file/edit',
								    type: "POST",
								    data:{
								    	'old_id_file':$('#old_id_file').val(),
								    	'tittle_file_edit':$('#tittle_file_edit').val(),
								    	'content_file_edit':$('#content_file_edit').val()
								    },
								    beforeSend: function(){
								        $('#loading_edit_file').show();
							    	},
						   		   	complete: function(){
							    	    $('#loading_edit_file').hide();
							    	},
								    success: function (data) {
										if(data.error_edit_file == true){
											$('.error').hide();
											if(data.messages.success_edit_file != undefined){
												$('.errorTittle_edit').show().text(data.messages.tittle_file_edit[0]);
											}
										}
										if(data.success_edit_file == true){
											$('#file_table').load('/studyenglishtoday/admin/text_file/show #file_table');
											setTimeout(function() { $('#editfileModal').modal('hide');}, 200);
											setTimeout(function(){ $("#edit_file_success").modal('show');},300);
											setTimeout(function(){ $("#edit_file_success").modal('hide'); },2000);
											setTimeout(function() { window.location.href = "/studyenglishtoday/admin/text_file/show";}, 2200);
										}
								    },
								})
					    	}
						})
					}
				})
			})
		}
	})


/*Delete Audio*/
$('#delete_file').click(function(event){
	event.preventDefault();
	if(checked==1){
		$(".table input:checkbox:checked").map(function(){
    	var searchIDs = [];
        searchIDs.push($(this).val());
    	//console.log(searchIDs[0]);
    	id = searchIDs[0];
			$('#deletefileModal').modal('show');
			$('#id_delete_file').val(id);

			$('#deletefileModal').find('#confirmdelete').on('click',function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/studyenglishtoday/admin/text_file/delete',
					method:"POST",
					data: {
						"id":id,
						"id_delete_file":$('#id_delete_file').val()
					},
					beforeSend: function(){
				        $('#loading_delete_file').show();
			    	},
		   		   	complete: function(){
			    	    $('#loading_delete_file').hide();
			    	},
					success:function(){
						$('#deletefileModal').modal('hide');
						for(var i=0; i<id.length; i++){
							$('tr#'+id+'').css('background-color','#ccc');
							$('tr#'+id+'').fadeOut(1000);
						}
						setTimeout(function() { window.location.href = "/studyenglishtoday/admin/text_file/show";}, 1200);
					}
				});
			})
		})
    }
})
