@extends('admin/layouts/adminmaster')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">

					<div class="panel-heading">
						<h3 class="panel-title">Edit Category</h3>
					</div>

					<div class="panel-body">
						<form action="" method="POST"  role="form">

								<div class="form-group">
									<label for="">Edit name</label>
									<input type="text" name="name" class="form-control" autofocus>
								</div>

								<div class="form-group">
									<label for="">Edit Alias</label>
									<input type="text" name="alias" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Edit Order</label>
									<input type="text" name="order" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Edit Parent Id</label>
									<input type="text" name="parent_id" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Edit Keywords</label>
									<input type="text" name="keywords" class="form-control">
								</div>

								<div class="form-group">
									<label for="">Edit Description</label>
									<input type="text" name="desctiption" class="form-control">
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary">Edit</button>
								</div>

						</form>

						<a href="{{route('showcate')}}"><button class="btn btn-warning pull-right">Show categories</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>


@stop