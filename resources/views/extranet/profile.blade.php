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
						@if(auth()->user()->access_id === 1 && $user->access_id !== 1)
								<form action="{{ route('profile.destroy', $user->id) }}" method="POST">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<button type="submit" class="btn btn-danger">Borrar</button>
								</form>
						@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<br>
@if(auth()->user()->access_id !== 1)
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-lg-6">
				<p><h1 style="width: 100%;">Agregar Dirección</h1></p>
				<form action="{{ route('address.store') }}" method="POST">
					{!! csrf_field() !!}
					{{-- {!! method_field('PUT') !!} --}}
					<div class="form-group">
						<textarea cols="50" rows="10" placeholder="Direccion" name="address" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="text" name="zip_code" placeholder="Codigo Postal" class="form-control">
					</div>
					<div class="form-group">
						<select class="form-control" name="city_id">
							<option value="1">Maracaibo</option>
						</select>
					</div>
					<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
					<br>	
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
			<div class="col-md-12 col-lg-6">
				<p><h1 style="width: 100%;">Direcciones Guardadas</h1></p>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Direccion</th>
							<th>Codigo Postal</th>
							<th>Ciudad</th>
							<th colspan="2">Acciones</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach(app('App\Http\Controllers\AddressController')->index() as $address)
							<tr>
								<td>{{ $address->address }}</td>
								<td>{{ $address->zip_code }}</td>
								<td>{{ $address->city_id }}</td>
								<td colspan="2">
									<form action="{{ route('address.destroy', $address->id) }}" method="POST">
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

	</div>
	<br>
	<div class="container ">
		<div class="row">
			
			<div class="col-md-12 col-lg-6">
				<p><h1 style="width: 100%;">Agregar Tarjeta</h1></p>
				<form action="{{ route('card.store') }}" method="POST">
					{!! csrf_field() !!}
					{{-- {!! method_field('PUT') !!} --}}
					<div class="form-group">
						<input type="text" name="card_number" placeholder="Numero de Tarjeta" class="form-control">
					</div>
					<div class="form-group">
						<label for="exp_month">Mes de Expiración</label>
						<select class="form-control" name="exp_month">
							@for($i=1;$i<=12;$i++)
								<option value="{{$i}}">{{$i}}</option>
							@endfor
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="exp_year" placeholder="Año de Expiración" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="card_name" placeholder="Nombre en la tarjeta" class="form-control">
					</div>
					<div class="form-group">
						<select name="type_id" class="form-control">
							<option value="" disabled selected>Seleccionar tipo de tarjeta</option>
							<option value="1">Visa</option>
							<option value="2">MasterCard</option>
							<option value="3">American Express</option>
							<option value="4">PayPal</option>
						</select>
					</div>


					<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
					<br>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
			<div class="col-md-12 col-lg-6">
				<p><h1 style="width: 100%;">Tarjetas Guardadas</h1></p>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Número</th>
							<th>Expiración</th>
							<th>Tipo</th>
							<th colspan="2">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach(app('App\Http\Controllers\CardController')->index() as $card)
							<tr>
								<td>{{ $card->card_number }}</td>
								<td>{{ $card->exp_month }} / {{ $card->exp_year }} </td>
								<td>{{ $card->type_id }}</td>
								<td colspan="2">
									<form action="{{ route('card.destroy', $card->id) }}" method="POST">
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

	</div>
{{-- agregar telefonos --}}
	<br>
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-lg-6">
				<p><h1 style="width: 100%;">Agregar Telefonos</h1></p>
				<form action="{{ route('phone.store') }}" method="POST">
					{!! csrf_field() !!}
					{{-- {!! method_field('PUT') !!} --}}
					<div class="form-group">
						<input type="text" name="phone_number" placeholder="Numero de Telefono" class="form-control">
					</div>
					
					<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
					<br>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
			<div class="col-md-12 col-lg-6">
				<p><h1 style="width: 100%;">Telefonos Guardados</h1></p>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Numero de Telefono</th>
							<th colspan="2">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach(app('App\Http\Controllers\PhoneController')->index() as $phone)
							<tr>
								<td>{{ $phone->id }}</td>
								<td>{{ $phone->phone_number }}</td>
								<td colspan="2">
									<form action="{{ route('phone.destroy', $phone->id) }}" method="POST">
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
	</div>
	<br>
@endif


@endsection