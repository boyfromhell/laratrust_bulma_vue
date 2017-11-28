@extends('layouts.manage') 
@section('content')
<div class="flex-container">
	<div class="columns">
		<div class="column">
			<h1 class="title">Manage Permissions</h1>
		</div>
		<div class="column">
			<a href="{{route('permissions.create')}}" class="button is-primary  is-pulled-right">
				<i class="fa fa-user-plus"></i>&nbsp; Create New Permission</a>
		</div>
	</div>
	<hr>

	<div class="columns">
		<div class="column ">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>Name</th>
						<th>Slug</th>
						<th>Discription</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($permissions as $permission)
					<tr>
						<th>{{$permission->display_name}}</th>
						<td>{{$permission->name}}</td>
						<td>{{$permission->description}}</td>
						<td>
							<a href="{{route('permissions.show', $permission->id)}}" class="button is-outlined">View</a>
                            <a href="{{route('permissions.edit', $permission->id)}}" class="button is-outlined">Edit</a>
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
            {{$permissions->links()}}
		</div>
	</div>
</div>
@endsection