@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">List of Projects</h3>
			</div>
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs" data-ajaxurl="/ajaxGetProjects">
					<li class="active"><a href="0" data-toggle="tab" aria-expanded="true">All</a></li>
					<li class=""><a href="2" data-toggle="tab" aria-expanded="false">Pending</a></li>
					<li class=""><a href="3" data-toggle="tab" aria-expanded="false">In progress</a></li>
					<li class=""><a href="4" data-toggle="tab" aria-expanded="false">Rejected</a></li>
					<li class=""><a href="5" data-toggle="tab" aria-expanded="false">Approved</a></li>
					<li class=""><a href="1" data-toggle="tab" aria-expanded="false">Not Approved</a></li>
				</ul>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered">
					<tbody>
					<tr>
						<th>ID</th>
						<th>Type</th>
						<th>Name</th>
						<th>Description</th>
						<th>Customer</th>
						<th>Budget In Time</th>
						<th>Budget In Money</th>
						<th>Lead</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
					@foreach($projects as $project)
						<tr>
							<td>{{$project->project_id}}</td>
							<td>{{$project->project_type}}</td>
							<td>{{$project->project_name}}</td>
							<td>{{$project->project_description}}</td>
							<td>{{$project->clName}}</td>
							<td>{{$project->project_budget_time}}</td>
							<td>{{$project->project_budget_money}}</td>
							<td>{{$project->uName}}</td>
							<td>
								<span class="label {{Statuses::getClassName($project->status_name)}}">{{$project->status_name}}</span>
							</td>
							<td>
								<a href="/projects/editProject/{{$project->project_id}}"><span class="label label-warning"><i class="icon fa fa-edit"></i> Edit</span></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
			<div class="box-footer clearfix">
				@if(Auth::user()->hasRole(1))
					<div class="col-md-2">
						<a href="{{ url('/projects/add') }}" ><input class="btn btn-success" type="submit" value="Add Project"></a> <br />
					</div>
				@endif
				<div class="col-md-10">
					<ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">«</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">»</a></li>
					</ul>
				</div>
			</div>
		</div>

		{{--
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th>ID</th>
					<th>Type</th>
					<th>Name</th>
					<th>Description</th>
					<th>Customer</th>
					<th>Budget In Time</th>
					<th>Budget In Money</th>
					<th>Lead</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
					@foreach($projects as $project)
					<tr>
						<td>{{$project->id}}</td>
						<td>{{$project->project_type}}</td>
						<td>{{$project->project_name}}</td>
						<td>{{$project->project_description}}</td>
						<td>{{$project->clName}}</td>
						<td>{{$project->project_budget_time}}</td>
						<td>{{$project->project_budget_money}}</td>
						<td>{{$project->uName}}</td>
						<td>{{$project->status_name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		--}}
	</div>
</div>
{{--
@if(Auth::user()->hasRole(1))
<div class="container">
	<div class="row">
		<div class="col-md-2">
			<a href="{{ url('/projects/add') }}" ><input class="btn btn-success" type="submit" value="Add Project"></a> <br />
		</div>
		<div class="col-md-10">

		</div>
	</div>
</div>
@endif
---}}
@endsection