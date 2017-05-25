@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="box">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Use the form below to edit project information</h3>
					</div>
				</div>
				<div class="box-body">
					@if($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-error">{{ $error }}</div>
						@endforeach
					@endif
					<form role="form" method="post" action="{{ url('/projects/saveEditProject') }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Project Type</label>
									{{ Form::select('project_type', $typeOfProjects, $project->project_type, ['class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Project Name</label>
									<input class="form-control" type="text" name="project_name" value="{{Input::old('project_name', $project->project_name)}}" required>
									<input type="hidden" name="id" value="{{$project->id}}" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Project Description</label>
									<input class="form-control" type="text" value="{{ Input::old('project_description', $project->project_description)}}" name="project_description">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Customer</label>
									{{ Form::select('project_customer', $customers, $project->project_customer, ['class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Budget in time</label>
									<input class="form-control" type="text" value="{{ Input::old('project_budget_time', $project->project_budget_time)}}" name="project_budget_time">
								</div>

							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Budget in money</label>
									<input class="form-control" type="text" value="{{ Input::old('project_budget_money', $project->project_budget_money)}}" name="project_budget_money">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label class="col-md-4">Project Lead</label>
									{{ Form::select('project_lead', $projectLead, $project->project_lead, ['class' => 'form-control']) }}
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-4">Status</label>
									{{ Form::select('project_status', $status, $project->project_status, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="col-md-4"></div>
							<div class="col-md-4">
								<label for=""></label>
								<div class="text-right">
									<button class="btn btn-success" type="submit">Edit project</button>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
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