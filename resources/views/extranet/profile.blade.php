@extends('extranet.adminlayout')


@section('content')
<div class="container">
	<div class="row">	


		<h1>Información del Usuario</h1>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Rol</th>
					<th colspan="3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						{{-- <td>{{ $user->accesslevel->name }}</td> --}}
						<td>
				
						</td>
						<td>
							<a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary"> 
								Modificar
							</a>
						</td>
						<td>
							<form action="{{ route('profile.destroy', $user->id) }}" method="POST">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection