

	$('#view_comment').fadeOut(2000);
	$('#delete_comment').fadeOut(2000);

	var checkBoxes = $('input[type=checkbox]');
	var checked=0;

	$('.table tr').click(function(event) {
    	checked=1;
    	$('#view_comment').fadeIn(1000);
		$('#delete_comment').fadeIn(1000);

	    if (event.target.type !== 'checkbox') {
    		$(':checkbox', this).trigger('click');
    	}
		$('.table tr').on('click', 'input[type=checkbox]', function () {
		  checkBoxes.prop('checked', false);
		  $(this).prop('checked', true);
		});
	    $(this).addClass("selected").siblings().removeClass("selected");
	});


	/*Show Detail Comment*/
	var id="";
	$("#view_comment").click(function(event){
	    event.preventDefault();
		if(checked==0){
			$('#viewcomment_errorModal').modal('show');
		}
		if(checked==1){
			$('#viewcommentModal').modal('show');
		    $(".table input:checkbox:checked").map(function(){
		    	var searchIDs = [];
		        searchIDs.push($(this).val());
		    	id = searchIDs[0];
			    	$.ajax({
			    		url:'/studyenglishtoday/admin/comment/detail',
			    		type: "GET",
			    		data: {"id":id,},
			    		success:function(result){
		    	//console.log(result);
			    			$('#viewcommentModal').modal('show');

			    			$('#user_comment').html(result.user_comment);
			    			$('#article_type').html(result.article_type);
			    			$('#article_title').html(result.article_name);
			    			$('#comment').html(result.comment);
			    			$('#date').html(result.created_at);
			    		}
			    	})
			    })
			}
	    })

/*Delete Comment*/
$('#delete_comment').click(function(event){
	event.preventDefault();
	if(checked==0){
		$('#viewcomment_errorModal').modal('show');
	}
	if(checked==1){
		$(".table input:checkbox:checked").map(function(){
    	var searchIDs = [];
        searchIDs.push($(this).val());
    	//console.log(searchIDs[0]);
    	id = searchIDs[0];
    		$('#deletecommentModal').modal('show');
			$.ajax({
				url: '/studyenglishtoday/admin/comment/delete',
				type:"GET",
				data: {"id":id},
				success:function(result){
					$('#deletecommentModal').find('#confirmdelete').on('click',function(){
						$.ajaxSetup({
						    headers: {
						        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						    }
						});
						$.ajax({
							url: '/studyenglishtoday/admin/comment/delete',
							method:"POST",
							data: {id:id},
							success:function(){
								$('#deletecommentModal').modal('hide');
								for(var i=0; i<id.length; i++){
									$('tr#'+id+'').css('background-color','#ccc');
									$('tr#'+id+'').fadeOut(1000);

								}
								setTimeout(function() { window.location.href = "/studyenglishtoday/admin/comment/show";}, 1200);
							}
						});
					})
				}
			})
		})
    }
})