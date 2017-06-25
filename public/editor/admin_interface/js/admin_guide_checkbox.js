/*Checkbox Modal guidegory*/

/*Show and hide guide button*/

	$('#view_guide').fadeOut(2000);
	$('#edit_guide').fadeOut(2000);
	$('#delete_guide').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_guide').fadeIn(1000);
		$('#edit_guide').fadeIn(1000);
		$('#delete_guide').fadeIn(1000);

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
if($('#content_guide').length){
	ckeditor("content_guide", "config", "standard")
}
if($('#content_guide_edit').length){
	ckeditor("content_guide_edit", "config", "standard")
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
	/*View detail guide*/
	$('#view_guide').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewguide_errorModal').modal('show');
		}
		if(checked==1){
			$('#viewguideModal').modal('show');
			$('.table input:checkbox:checked').map(function(){
				var searchIDs = [];
				searchIDs.push($(this).val());
				id = searchIDs[0];

				$.ajax({
					url: '/laravel1/admin/guide/detail',
					type: "GET",
					data:{"id":id},
					success:function(result){
						//console.log(result);
						$('#view_title_guide').text(result.tittle);
						$('#view_guide_tittle').text(result.tittle);
						$('#view_guide_content').html(result.content);

				        var d = new Date();
							var my_date_format = function(input){
							  var d = new Date(Date.parse(input.replace(/-/g, "/")));

							  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

							  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
							  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
							  return (time + " " + date);

						};
						$('#view_guide_created').text(my_date_format(result.created_at));
					}
				})
			})
		}
	})

	/*Add guide*/
	$('#add_guide').click(function(){
		$('#addguideModal').modal('show');

		$('#validate_add_guide').validate({
			ignore:[],
			rules:{
				tittle_guide:{
					required:true,
					minlength:5,
					maxlength:30
				},
				content_guide:{
					required:true,
					minlength:30
				}

			},
			submitHandler: function () {
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/laravel1/admin/guide/add',
					type: 'POST',
					data:{
						'tittle_guide'  : $('#tittle_guide').val(),
						'content_guide' : $('#content_guide').val()
					},
					success:function(data){
						if(data.error_add_guide == true){
							$('.error').hide();
							if(data.messages.tittle_guide != undefined){
								$('.error_tittle_add_guide').show().text(data.messages.tittle_guide[0]);
							}
						}
						if(data.add_guide == true){
							$('#guide_table').load('/laravel1/admin/guide/show #guide_table');
							setTimeout(function() { $('#addguideModal').modal('hide');}, 200);
							setTimeout(function(){ $("#add_guide_success").modal('show');},1000);
							setTimeout(function(){ $("#add_guide_success").modal('hide'); },3000);
							setTimeout(function() { window.location.href = "/laravel1/admin/guide/show";}, 4000);
						}
					}
				})
			}
		})
	})

	/*Edit guide*/
	$('#edit_guide').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewguide_errorModal').modal('show');
		}
		if(checked==1){
			$('#editguideModal').modal('show');

			$('.table input:checkbox:checked').map(function(){
				var searchIDs = [];
				searchIDs.push($(this).val());
				id = searchIDs[0];

				$.ajax({
					url:'/laravel1/admin/guide/edit',
					type:'GET',
					data:{"id":id},
					success:function(result){
						console.log(result);
						$('#old_id_guide').val(result.id);
						$('#tittle_guide_edit').val(result.tittle);
						CKEDITOR.instances['content_guide_edit'].setData(result.content);

						$('#validate_edit_guide').validate({
							ignore:[],
							rules:{
								tittle_guide_edit:{
									required:true,
									minlength:5,
									maxlength:30
								},
								content_guide_edit:{
									required:true,
									minlength:30
								}
							},
							submitHandler:function(){
								$.ajaxSetup({
								    headers: {
								        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								    }
								});
								$.ajax({
									'url' : '/laravel1/admin/guide/edit',
									'type' :'POST',
									'data': {
										'old_id_guide'			:$('#old_id_guide').val(),
										'tittle_guide_edit' 	:$('#tittle_guide_edit').val(),
										'content_guide_edit'   :$('#content_guide_edit').val()
									},
									success:function(data){
										if(data.error_edit_guide == true){
											$('.error').hide();
											if(data.messages.tittle_guide_edit != undefined){
												$('.error_tittle_edit_guide').show().text(data.messages.tittle_guide_edit[0]);
											}
										}
										if(data.edit_guide==true){
											$('#guide_table').load('/laravel1/admin/guide/show #guide_table');
											setTimeout(function() { $('#editguideModal').modal('hide');}, 200);
											setTimeout(function(){ $("#edit_guide_success").modal('show');},1000);
											setTimeout(function(){ $("#edit_guide_success").modal('hide'); },3000);
											setTimeout(function() { window.location.href = "/laravel1/admin/guide/show";}, 3300);
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

	/*Delete guide*/
	$('#delete_guide').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewguide_errorModal').modal('show');
		}
		if(checked==1){
			$('#deleteguideModal').modal('show');
			$(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];
			})
			$.ajax({
				url: '/laravel1/admin/guide/delete',
				type:"GET",
				data: {"id":id},
				success:function(result){
					$('.name_delete_guide').show().html(result.tittle);
					//console.log(result);
					$('#deleteguideModal').find('#confirmdelete').on('click',function(){
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$.ajax({
							url: '/laravel1/admin/guide/delete',
							method:"POST",
							data: {id:id},
							success:function(){
								$('#deleteguideModal').modal('hide');
								for(var i=0; i<id.length; i++){
									$('tr#'+id+'').css('background-color','#ccc');
									$('tr#'+id+'').fadeOut(1000);

								}
								setTimeout(function() { window.location.href = "/laravel1/admin/guide/show";}, 1200);
							}
						})
					})
				}
			})
		}
	})