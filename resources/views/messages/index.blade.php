@extends('extranet.adminlayout')


@section('content')

<div class="container">
	<div class="row">
		@if(session('info'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					&times;
				</button>
				<strong>Exito!</strong> {{ session('info') }}
			</div>
		@endif


		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Mensaje</th>
					<th colspan="3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($messages as $message)
					<tr>
						<td>{{ $message->name }}</td>
						<td>{{ $message->email }}</td>
						<td>{{ $message->message }}</td>
						<td>
							<a href="{{ route('contact.show', $message->id) }}" class="btn btn-info"> 
								Ver Mensaje 
							</a>
						</td>
						<td>
							<a href="{{ route('contact.edit', $message->id) }}" class="btn btn-primary"> 
								Editar Mensaje
							</a>
						</td>
						<td>
							<form action="{{ route('contact.destroy', $message->id) }}" method="POST">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button type="submit" class="btn btn-danger">Borrar Mensaje</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection