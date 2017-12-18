@extends('extranet.adminlayout')

@section('content')
<div class="container">
	<div class="row">
		<div class="content ml-auto mr-auto">
			<legend>Editar Mensaje</legend>
			<form action="{{ route('contact.update', $message->id) }}" method="POST">
				{!! csrf_field() !!}
				{!! method_field('PUT') !!}
				<div class="form-group">
					<label for="name" class="form-label">Nombre</label>
					<input type="text" name="name" class="form-control" value="{{ $message->name }}">
					{!! $errors->first('name', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="email" class="form-label">Correo</label>
					<input type="text" name="email" class="form-control" value="{{ $message->email }}">
					{!! $errors->first('email', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="message" class="form-label">Mensaje</label>
					<textarea name="message" id="message" class="form-control noresize" cols="30" rows="10">{{ $message->message }}</textarea>
					{!! $errors->first('message', '<p class="error">:message</p>') !!}
				</div>
				<button type="submit" class="btn btn-default">Enviar</button>
			</form>
		</div>
	</div>
</div>
@stop