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
<br>
<div class="container form-inline">
	<div class="row col-md-12 col-lg-6">
		<p><h1 style="width: 100%;">Agregar Dirección</h1></p>
		<form action="" method="POST">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}
			<div class="form-group">
				<textarea cols="50" rows="10" placeholder="Direccion" name="address" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="text" name="zipcode" placeholder="Codigo Postal" class="form-control">
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
	<div class="row col-md-12 col-lg-6">
		<p><h1 style="width: 100%;">Direcciones Guardadas</h1></p>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Direccion</th>
					<th>Codigo Postal</th>
					<th>Ciudad</th>
					<th colspan="3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		
	</div>

</div>
<br>
<div class="container form-inline">
	<div class="row col-md-12 col-lg-6">
		<p><h1 style="width: 100%;">Agregar Tarjeta</h1></p>
		<form action="" method="POST">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}
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
					<option value="1">Visa</option>
					<option value="2">MasterCard</option>
				</select>
			</div>


			<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
			<br>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</div>
	<div class="row col-md-12 col-lg-6">
		<p><h1 style="width: 100%;">Tarjetas Guardadas</h1></p>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Número</th>
					<th>Expiración</th>
					<th>Tipo</th>
					<th colspan="3">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td colspan="3"></td>
				</tr>
			</tbody>
		</table>
		
	</div>

</div>
<br>


@endsection