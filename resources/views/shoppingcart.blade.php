@extends('welcome')


@section('content')

<div class="container">
	<div class="row">
		<table  class="table table-striped table-hover">
			<thead>
				<th>ID</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th colspan="3">Acciones</th>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->name }}</td>
						<td>{{ number_format($item->price, 2, ',', '.') }}</td>
						<td>{{ number_format($item->qty, 2, ',', '.') }}</td>
						<td colspan="3">
							{{-- <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary"> 
								Modificar
							</a> --}}
							{{-- <a href="" class="btn btn-danger">Borrar</a> --}}
							<form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
								{!! csrf_field() !!}
								{!! method_field('DELETE') !!}
								<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</td>
					</tr>

				@endforeach
			</tbody>
			<tfoot>
				
		   		<tr>
		   			<td colspan="5">&nbsp;</td>
		   			<td>Subtotal</td>
		   			<td><?php echo Cart::subtotal(); ?></td>
		   		</tr>
		   		<tr>
		   			<td colspan="5">&nbsp;</td>
		   			<td>Impuesto</td>
		   			<td><?php echo Cart::tax(); ?></td>
		   		</tr>
		   		<tr>
		   			<td colspan="5">&nbsp;</td>
		   			<td>Total</td>
		   			<td><?php echo Cart::total(); ?></td>
		   		</tr>
 
			</tfoot>
		</table>
		<form action="{{ route('cart.update',auth()->user()->email) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('PATCH') !!}
			<button class="btn btn-primary" type="submit">Guardar</button>
		</form>
		<form action="{{ route('cart.show',auth()->user()->email) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('GET') !!}
			<button class="btn btn-success">Restaurar</button>
		</form>
		<form action="{{ route('payout.create') }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('GET') !!}
			<button class="btn btn-success">Pagar</button>
		</form>
		<form action="{{ route('payout.destroy', auth()->user()->email) }}" method="POST">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
			<button class="btn btn-danger">Borrar Carrito</button>
		</form>
	</div>
</div>	

@endsection