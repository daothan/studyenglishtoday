$('#view_listening').fadeOut(2000);
	$('#edit_listening').fadeOut(2000);
	$('#delete_listening').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_listening').fadeIn(1000);
		$('#edit_listening').fadeIn(1000);
		$('#delete_listening').fadeIn(1000);

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
if($('#tittle_listening').length){
	ckeditor("introduce_listening", "config", "basic")
	ckeditor("transcript_listening", "config", "standard")
}
if($('#introduce_listening_edit').length){
	ckeditor("introduce_listening_edit", "config", "basic")
	ckeditor("transcript_listening_edit", "config", "standard")
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


/*Add listening*/

/*Validate form and add*/
	for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
	$('#add_listening').click(function(){

		$('#addlisteningModal').modal('show');

		$('#validate_add_listening').validate({
			ignore: [],/*ignore hidden field*/
			rules:{
				tittle_listening:{
					required:true
				},
				audio_listening:{
					required:true
				},
	            transcript_listening: {
	            	required  :true
	            }
			},
			submitHandler: function () {
	        	$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
				    url: '/laravel1/admin/listening/add',
				    type: "POST",
				    async: true,
				    dataType: "json", // or html if you want...
				    contentType: false, // high importance!
				    data:new FormData($("#validate_add_listening")[0]), // high importance!
				    processData: false, // high importance!
				    success: function (data) {
						console.log(data);
						if(data.error_add_listening ==true){
							$('.error').hide();
							if(data.messages.tittle_listening != undefined){
								$('.errortittle_listening_add').show().text(data.messages.tittle_listening[0]);
							}
						}
						if(data.add_listening == true){
							$('#listening_table').load('/laravel1/admin/listening/show #listening_table');
							setTimeout(function() { $('#addlisteningModal').modal('hide');}, 200);
							setTimeout(function(){ $("#add_listening_success").modal('show');},1000);
							setTimeout(function(){ $("#add_listening_success").modal('hide'); },3000);
							setTimeout(function() { window.location.href = "/laravel1/admin/listening/show";}, 3200);
						}
				    },
				})
	    	}
		});
	});

/*View Content*/
var id="";
	$("#view_listening").click(function(event){
	    event.preventDefault();
		if(checked==0){
			$('#viewlistening_errorModal').modal('show');
		}
		if(checked==1){
			$('#viewlisteningModal').modal('show');
		    $(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];
			    	$.ajax({
			    		url:'/laravel1/admin/listening/detail',
			    		type: "GET",
			    		data: {"id":id,},
			    		success:function(result){
			    			console.log(result);
			    			$('#viewlisteningModal').modal('show');

			    			$('#listening_tittle').html(result.tittle);
			    			$('#listening_introduce').html(result.introduce);
			    			$('#listening_audio').html(result.audio);
			    			$('#listening_transcript').html(result.transcript);

			    			var path = "http://localhost/laravel1/"+result.audio_path;
			    			$("#oggSource").attr("src", path).detach().appendTo("#audioPlayer");
			    		}
			    	})
			    })
			}
	    })

$("#edit_listening").click(function(event){
	    event.preventDefault();
	    if(checked==0){
			$('#view_listening_error_Modal').modal('show');
		}
		if(checked==1){
			$('#editlisteningModal').modal('show');
		    $(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	//console.log(searchIDs[0]);
		    	id = searchIDs[0];

		    	$.ajax({
				url:'/laravel1/admin/listening/edit',
				type: "GET",
				data:{"id":id},
					success: function(result){
						console.log(result);
						$('#old_id_edit_listening').val(result.id);
						$('#tittle_listening_edit').val(result.tittle);
						$('#old_audio').html(result.audio);
						CKEDITOR.instances['introduce_listening_edit'].setData(result.introduce);
						CKEDITOR.instances['transcript_listening_edit'].setData(result.transcript);

						/*Validate and edit data*/
						$('#validate_edit_listening').validate({
							ignore:[], /*ignore hidden field*/
							rules:{
								tittle_listening_edit:{
									required:true
								},
								introduce_listening_edit:{
									required:true
								},
								transcript_listening_edit:{
									required:true
								}
							},
							submitHandler: function(){
								$.ajaxSetup({
								    headers: {
								        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								    }
								});
								$.ajax({
									url: '/laravel1/admin/listening/edit',
								    type: "POST",
								    async: true,
								    dataType: "json", // or html if you want...
								    contentType: false, // high importance!
								    data:new FormData($("#validate_edit_listening")[0]), // high importance!
								    processData: false, // high importance!
								    success: function (data){
										if(data.error_edit_listening ==true){
											$('.error').hide();
											if(data.messages.tittle_listening_edit != undefined){
												$('.errorTittle_edit').show().text(data.messages.tittle_listening_edit[0]);
											}
										}
										if(data.edit_listening == true){
										    $('#listening_table').load('/laravel1/admin/listening/show #listening_table');
											setTimeout(function(){$('#editlisteningModal').modal('hide');}, 200);
											setTimeout(function(){$("#edit_listening_success").modal('show');},1000);
											setTimeout(function(){$("#edit_listening_success").modal('hide');},3000);
											setTimeout(function(){ window.location.href = "/laravel1/admin/listening/show";}, 3200);
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

 $(".image-preview-input input:file").change(function (){
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-filename").val(file.name);
        }
        reader.readAsDataURL(file);
});


 /*Delete Audio*/
$('#delete_listening').click(function(event){
	event.preventDefault();
	if(checked==0){
		$('#view_listening_error_Modal').modal('show');
	}
	if(checked==1){
		$(".table input:checkbox:checked").map(function(){
    	var searchIDs = [];
        searchIDs.push($(this).val());
    	//console.log(searchIDs[0]);
    	id = searchIDs[0];
    		$('#deletelisteningModal').modal('show');
			$('#deletelisteningModal').find('#confirmdelete').on('click',function(){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
					url: '/laravel1/admin/listening/delete',
					method:"POST",
					data: {id:id},
					success:function(){
						$('#deletelisteningModal').modal('hide');
						for(var i=0; i<id.length; i++){
							$('tr#'+id+'').css('background-color','#ccc');
							$('tr#'+id+'').fadeOut(1000);

						}
						setTimeout(function() { window.location.href = "/laravel1/admin/listening/show";}, 1200);
					}
				});
			})
		})
    }
})