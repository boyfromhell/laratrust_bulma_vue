@extends('layouts.manage') 
@section('content')
<div class="flex-container">
	<div class="columns">
		<div class="column">
			<h1 class="title">Manage Users</h1>
		</div>
		<div class="column">
			<a href="{{route('users.create')}}" class="button is-primary  is-pulled-right">
				<i class="fa fa-user-plus"></i>&nbsp; Create New User</a>
		</div>
	</div>
	<hr>

	<div class="columns">
		<div class="column ">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>User id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Date Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<th>{{$user->id}}</th>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->created_at->toFormattedDateString()}}</td>
						<td>
							<a href="{{route('users.edit', $user->id)}}" class="button is-outlined">Edit</a>
                            {{--  <a href="{{route('users.destroy', $user->id)}}" class="button is-outlined" onclick="event.preventDefault();
                         document.getElementById('delete-form').submit();">Delete</a>  --}}
                        {{--  {!! Form::open(['route'=>['user.destroy',$user->id], 'method'=>'DELETE']) !!}  --}}
                {{--  {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block'])!!}  --}}
                {{--  {!! Form::close() !!}  --}}
                         {{--  @include('_includes.forms.delete')  --}}
                         

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
            {{$users->links()}}
		</div>
	</div>
</div>
@endsection