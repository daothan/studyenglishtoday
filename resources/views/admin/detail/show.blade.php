@extends('admin.layouts.adminmaster')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel">
					<div class="panel">
						<div class="panel-tittle">
							<h2>Show Details</h2>
						</div>

						<div class="panel-body">
							<form action="" method="POST" class="form-horizontal" role="form">
									<div class="form-group">
										<legend>Form title</legend>
									</div>

									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-2">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
				<a href="{{route('admin.detail.getAdd')}}"><button class="btn btn-success pull-right">Add Details</button></a>
			</div>
		</div>
	</div>

@stop