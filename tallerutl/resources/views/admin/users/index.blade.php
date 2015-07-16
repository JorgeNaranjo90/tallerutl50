@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Users</div>

				<div class="panel-body">
					<p>{!! $users->total() !!} usuarios</p>
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Acciones</th>
						</tr>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->full_name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<a href="">Editar</a>
									<a href="">Eliminar</a>
								</td>
							</tr>
						@endforeach
					</table>
					{!! $users->render() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection