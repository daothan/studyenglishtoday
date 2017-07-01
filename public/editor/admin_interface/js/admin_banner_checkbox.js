/*Checkbox Modal bannergory*/

/*Show and hide banner button*/

	$('#view_banner').fadeOut(2000);
	$('#edit_banner').fadeOut(2000);
	$('#delete_banner').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_banner').fadeIn(1000);
		$('#edit_banner').fadeIn(1000);
		$('#delete_banner').fadeIn(1000);

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
if($('#introduce_banner').length){
	ckeditor("introduce_banner", "config", "basic")
	ckeditor("content_banner", "config", "standard")
}
if($('#introduce_banner_edit').length){
	ckeditor("introduce_banner_edit", "config", "basic")
	ckeditor("content_banner_edit", "config", "standard")
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
	/*View detail banner*/
	$('#view_banner').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewbanner_errorModal').modal('show');
		}
		if(checked==1){
			$('#viewbannerModal').modal('show');
			$('.table input:checkbox:checked').map(function(){
				var searchIDs = [];
				searchIDs.push($(this).val());
				id = searchIDs[0];

				$.ajax({
					url: '/laravel1/admin/banner/detail',
					type: "GET",
					data:{"id":id},
					success:function(result){
						//console.log(result);
						$('#view_title_banner').text(result.tittle);
						$('#view_banner_tittle').text(result.tittle);
						$('#view_banner_introduce').html(result.introduce);
						$('#view_banner_content').html(result.content);

				        var d = new Date();
							var my_date_format = function(input){
							  var d = new Date(Date.parse(input.replace(/-/g, "/")));

							  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

							  var date = d.getDay().toString() + " " + month[d.getMonth().toString()] + ", " +    d.getFullYear().toString();
							  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
							  return (time + " " + date);

						};
						$('#view_banner_created').text(my_date_format(result.created_at));
					}
				})
			})
		}
	})

	/*Add Banner*/
	$('#add_banner').click(function(){
		$('#addbannerModal').modal('show');

		$('#validate_add_banner').validate({
			ignore:[],
			rules:{
				tittle_banner:{
					required:true,
					minlength:5,
					maxlength:30
				},
				introduce_banner:{
					required:true,
					minlength:20
				},
				content_banner:{
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
					url: '/laravel1/admin/banner/add',
					type: 'POST',
					data:{
						'tittle_banner'  	: $('#tittle_banner').val(),
						'introduce_banner'  : $('#introduce_banner').val(),
						'content_banner'    : $('#content_banner').val()
					},
					success:function(data){
						if(data.error_add_banner == true){
							$('.error').hide();
							if(data.messages.tittle_banner != undefined){
								$('.error_tittle_add_banner').show().text(data.messages.tittle_banner[0]);
							}
						}
						if(data.add_banner == true){
							$('#banner_table').load('/laravel1/admin/banner/show #banner_table');
							setTimeout(function() { $('#addbannerModal').modal('hide');}, 200);
							setTimeout(function(){ $("#add_banner_success").modal('show');},1000);
							setTimeout(function(){ $("#add_banner_success").modal('hide'); },3000);
							setTimeout(function() { window.location.href = "/laravel1/admin/banner/show";}, 4000);
						}
					}
				})
			}
		})
	})

	/*Edit Banner*/
	$('#edit_banner').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewbanner_errorModal').modal('show');
		}
		if(checked==1){
			$('#editbannerModal').modal('show');

			$('.table input:checkbox:checked').map(function(){
				var searchIDs = [];
				searchIDs.push($(this).val());
				id = searchIDs[0];

				$.ajax({
					url:'/laravel1/admin/banner/edit',
					type:'GET',
					data:{"id":id},
					success:function(result){
						//console.log(result);
						$('#old_id_banner').val(result.id);
						$('#tittle_banner_edit').val(result.tittle);
						CKEDITOR.instances['introduce_banner_edit'].setData(result.introduce);
						CKEDITOR.instances['content_banner_edit'].setData(result.content);

						$('#validate_edit_banner').validate({
							ignore:[],
							rules:{
								tittle_banner_edit:{
									required:true,
									minlength:5,
									maxlength:30
								},
								introduce_banner_edit:{
									required:true,
									minlength:20
								},
								content_banner_edit:{
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
									'url' : '/laravel1/admin/banner/edit',
									'type' :'POST',
									'data': {
										'old_id_banner'			:$('#old_id_banner').val(),
										'tittle_banner_edit' 	:$('#tittle_banner_edit').val(),
										'introduce_banner_edit' :$('#introduce_banner_edit').val(),
										'content_banner_edit'   :$('#content_banner_edit').val()
									},
									success:function(data){
										if(data.error_edit_banner == true){
											$('.error').hide();
											if(data.messages.tittle_banner_edit != undefined){
												$('.error_tittle_edit_banner').show().text(data.messages.tittle_banner_edit[0]);
											}
										}
										if(data.edit_banner==true){
											$('#banner_table').load('/laravel1/admin/banner/show #banner_table');
											setTimeout(function() { $('#editbannerModal').modal('hide');}, 200);
											setTimeout(function(){ $("#edit_banner_success").modal('show');},1000);
											setTimeout(function(){ $("#edit_banner_success").modal('hide'); },3000);
											setTimeout(function() { window.location.href = "/laravel1/admin/banner/show";}, 3300);
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

	/*Delete banner*/
	$('#delete_banner').click(function(event){
		event.preventDefault();
		if(checked==0){
			$('#viewbanner_errorModal').modal('show');
		}
		if(checked==1){
			$('#deletebannerModal').modal('show');
			$(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];
			})
			$.ajax({
				url: '/laravel1/admin/banner/delete',
				type:"GET",
				data: {"id":id},
				success:function(result){
					$('.name_delete_banner').show().html(result.tittle);
					//console.log(result);
					$('#deletebannerModal').find('#confirmdelete').on('click',function(){
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$.ajax({
							url: '/laravel1/admin/banner/delete',
							method:"POST",
							data: {id:id},
							success:function(){
								$('#deletebannerModal').modal('hide');
								for(var i=0; i<id.length; i++){
									$('tr#'+id+'').css('background-color','#ccc');
									$('tr#'+id+'').fadeOut(1000);

								}
								setTimeout(function() { window.location.href = "/laravel1/admin/banner/show";}, 1200);
							}
						})
					})
				}
			})
		}
	})