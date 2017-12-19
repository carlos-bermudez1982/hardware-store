@extends('welcome')



@section('content')

<div class="container">
	<div class="row">
		<h1>{{ auth()->user()->name }}</h1>
	</div>
	<form action="{{ route('payout.store') }}" method="post">
		{!! csrf_field() !!}
		
		<input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
		<table class="table table-striped table-hover">
			<thead>
				<th>Dirección</th>
				<th>Telefono</th>
				<th>Tarjeta</th>
			</thead>
			<tbody>
				<td>
					<div class="form-group">
						<select name="address_id" class="form-control">
							<option value="" disabled selected>Seleccionar Direccion</option>
							@foreach(app('App\Http\Controllers\AddressController')->index() as $address)
								<option value="{{ $address->id }}">{{ $address->address }}</option>
							@endforeach
						</select>
					</div>
						
				</td>
				<td>
					<div class="form-group">
						<select name="card_id" class="form-control">
							<option value="" disabled selected>Seleccionar Tarjeta</option>
							@foreach(app('App\Http\Controllers\CardController')->index() as $card)
								<option value="{{ $card->id }}">{{ $card->card_number }}</option>
							@endforeach
						</select>
					</div>
				</td>
				<td>
					<div class="form-group">
						<select name="phone_id" class="form-control">
							<option value="" disabled selected>Seleccionar Telefono</option>
							@foreach(app('App\Http\Controllers\PhoneController')->index() as $phone)
								<option value="{{ $phone->id }}">{{ $phone->phone_number }}</option>
							@endforeach
						</select>	
					</div>				
				</td>
			</tbody>
		</table>
		<div class="form-group">
			<button type="submit" class="btn btn-success">Pagar</button>
		</div>
	</form>

	<br>

	<table  class="table table-striped table-hover">
			<thead>
				<th>ID</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Cantidad</th>
			</thead>
			<tbody>
				@foreach(Cart::instance(auth()->user()->email)->content() as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ number_format($item->price, 2, ',', '.') }}</td>
						<td>{{ number_format($item->qty, 2, ',', '.') }}</td>
					</tr>

				@endforeach
			</tbody>
			<tfoot>
				
		   		<tr>
		   			<td colspan="2">&nbsp;</td>
		   			<td>Subtotal</td>
		   			<td><?php echo Cart::subtotal(); ?></td>
		   		</tr>
		   		<tr>
		   			<td colspan="2">&nbsp;</td>
		   			<td>Impuesto</td>
		   			<td><?php echo Cart::tax(); ?></td>
		   		</tr>
		   		<tr>
		   			<td colspan="2">&nbsp;</td>
		   			<td>Total</td>
		   			<td><?php echo Cart::total(); ?></td>
		   		</tr>
 
			</tfoot>
		</table>
</div>


@endsection