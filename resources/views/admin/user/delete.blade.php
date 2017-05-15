
	<div id="myModal" class="modal fade"  role="dialog">
	    <div class="modal-dialog modal-lg">
	        <div class="content modal_background">
	            <div class="modal-title">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	           		<h3 id="myModalLabel">Delete</h3>
	            </div>
	            <div class="modal-body">
	      			 <p></p>
	    		</div>
		        <div class="modal-footer">
		            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		            <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
		        </div>
			</div>
		</div>
	</div>
  <table width="100%" cellspacing="1" class="table table-bordered table-striped table-hover usertable" id="user_table">
		<thead>
			<tr>
				<th class="hidden-phone">Usuario</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th class="hidden-phone">Email</th>
				<th class="hidden-phone">Provincia</th>
				<th class="hidden-phone">Miembro desde</th>
				<th>Estado</th>
				<th></th>
				<th></th>
			</tr>
		</thead>

		<tbody>

			<tr>
				<td class="hidden-phone">johnny</td>
				<td>john</td>
				<td>doe</td>
				<td class="hidden-phone">dsd@gmail.com</td>
				<td class="hidden-phone">active</td>
              <td class="hidden-phone">10/12/1999</td>

            	<td><span class="label label-warning">Not Active</span></td>

				<td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>

                <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
            </tr>
			<tr>

				<td class="hidden-phone">kitty</td>
				<td>jane</td>
				<td>doe</td>
				<td class="hidden-phone">dasasasd@gmail.com</td>
				<td class="hidden-phone">active</td>
              <td class="hidden-phone">10/1/1999</td>

            	<td><span class="label label-danger">Activo</span></td>

				<td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/2">Edit</a></td>

                <td><a class="modal_link" data-toggle="modal" data-target="#myModal"><button class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span> VIEW</button></a></td>
            </tr>

           </tbody>
	</table>



	 <script type="text/javascript">
	    $('#myModal').on('show', function() {
		    var tit = $('.confirm-delete').data('title');

		    $('#myModal .modal-body p').html("Desea eliminar al usuario " + '<b>' + tit +'</b>' + ' ?');
		    var id = $(this).data('id'),
		    removeBtn = $(this).find('.danger');
		})
		$('.confirm-delete').on('click', function(e) {
		    e.preventDefault();

		    var id = $(this).data('id');
		    $('#myModal').data('id', id).modal('show');
		});

		$('#btnYes').click(function() {
		    // handle deletion here
		    var id = $('#myModal').data('id');
		    $('[data-id='+id+']').parents('tr').remove();
		    $('#myModal').modal('hide');
		});
	</script>