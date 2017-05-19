

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
	ckeditor("introduce", "config", "basic")
	ckeditor("content", "config", "standard")
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

/*Add detail*/
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
			ignore: [],
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
						console.log(data.messages.tittle[0]);
							$('.error').hide();
							if(data.messages.tittle != undefined){
								$('.errorTittle_add').show().text(data.messages.tittle[0]);
							}
						}else{
							setTimeout(function() { $('#adddetailModal').modal('hide');}, 200);
							setTimeout(function() { window.location.href = "/laravel1/admin/detail/show";}, 500);
						}
					}
				})
	    }
		});

	})
