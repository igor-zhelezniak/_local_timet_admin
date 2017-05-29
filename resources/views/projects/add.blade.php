@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<form role="form" method="post" action="{{ url('/projects/saveProject') }}">
				{{ csrf_field() }}
				<div class="row">
					@if($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-error">{{ $error }}</div>
						@endforeach
					@endif
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Project Type</label>

							{{ Form::select('ptype', $typeOfProjects, 1, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Project Name</label>
							{{ Form::text('pname', null, ['class' => 'form-control', 'required' => true]) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Project Description</label>
							{{ Form::text('pdesc', null, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Customer</label>
							{{ Form::select('pcustomer', $customers, 1, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Budget in time</label>
							{{ Form::text('pbudgettime', null, ['class' => 'form-control']) }}
						</div>

					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Budget in money</label>
							{{ Form::text('pbudgetmoney', null, ['class' => 'form-control']) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						<label class="col-md-4">Project Lead</label>
							{{ Form::select('plead', [null => 'Select Project Lead'] + $projectLead->toArray(), null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<label for=""></label>
						<div class="text-right">
							<button class="btn btn-success" type="submit">Add project</button>
						</div>
					</div>
				</div>

			</form>
		</div>
	</div>
{{--
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" action="{{ url('/projects/saveProject') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="col-md-4">Project Type</label>
							<select class="form-control" name="ptype">
								@foreach($typeOfProjects as $selectedType){
									<option value="{{$selectedType->id}}">{{$selectedType->type_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="col-md-">Project Name</label>
							<input class="form-control" type="text" name="pname" autofocus>

							<label class="col-md-4">Project Description</label>
							<input class="form-control" type="text" name="pdesc">

							<label class="col-md-4">Customer</label>
							<select class="form-control" name="pcustomer">
								@foreach($customers as $customer)
									<option value="{{$customer->id}}">{{$customer->name}}</option>
								@endforeach
							</select>

							<label class="col-md-4">Budget in time</label>
							<input class="form-control" type="text" name="pbudgettime">

							<label class="col-md-4">Budget in money</label>
							<input class="form-control" type="text" name="pbudgetmoney">

							<label class="col-md-4">Project Lead</label>
							<select name="plead" id="" class="form-control">
								<option value="">Select Project Lead</option>
								@foreach($projectLead as $lead)
									<option value="{{$lead->id}}">{{$lead->name}}</option>
								@endforeach
							</select>

							<input class="btn btn-success" type="submit" value="Add project">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<a href="{{ url('/projects') }}" ><input type="submit" value="Back to projects"></a> <br />
		</div>
	</div>

--}}


@endsection