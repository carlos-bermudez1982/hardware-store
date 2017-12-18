@extends('welcome')


@section('content')

<div class="container ">
	<div class="row">
		<div class="content ml-auto mr-auto">
			<legend>Contactanos</legend>
			<form action="{{ route('contact.store') }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="name" class="form-label">Nombre</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
					{!! $errors->first('name', '<p class="error">:message</p>') !!}
				</div>

				<div class="form-group">
					<label for="email" class="form-label">Correo</label>
					<input type="email" name="email" class="form-control" value="{{old('email')}}" required>
					{!! $errors->first('email', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="message" class="form-label">Mensaje</label>
					<textarea name="message" id="message" class="form-control" cols="30" rows="10" value="{{old('message')}}" required></textarea>
					{!! $errors->first('message', '<p class="error">:message</p>') !!}
				</div>

				<button type="submit" class="btn btn-outline-default">Enviar</button>
			</form>
		</div>
	</div>
</div>

@endsection