@extends('admin/layouts/adminmaster')

@section('content')


	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel">
					<div class="panel">
						<h2 class="panel-tittle">Edit Category</h2>
					</div>
					<div class="panel-body">

						<form action="" method="POST" class="form-horizontal" role="form">

							<div class="form-group">
								<label for="">Category Parent</label>
								<select name="parent_id" class="form-control" autofocus>
									<option selected value="0">Please Choose Category Parent..</option>
								</select>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>





@stop