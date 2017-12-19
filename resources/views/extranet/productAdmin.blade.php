@extends('extranet.adminlayout')

@section('content')

	<div class="container">
		<div class="row">
			<div class="inline-form">
				<h1>Articulos En Sistema</h1>
				<form action="{{ route('product.create') }}" method="post">
					{!! csrf_field() !!}
					{!! method_field('HEAD') !!}
					<button class="btn btn-success">Añadir Nuevo</button>
				</form>
			</div>
			
			<table  class="table table-striped table-hover">
				<thead>
					<th>ID</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Stock</th>
					<th colspan="3">Acciones</th>
				</thead>
				<tbody>
					@foreach($items as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ number_format($item->price, 2, ',', '.') }}</td>
							<td>{{ number_format($item->stock, 2, ',', '.') }}</td>
							<td colspan="3" class="inline-form">
								<form action="{{ route('product.destroy', $item->id) }}" method="POST">
									{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
									<a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary"> 
									Modificar
								</a>
									<button type="submit" class="btn btn-danger">Borrar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="container mr-auto" >
	
		<nav aria-label="Items navigation">
			{!! $items->render() !!}
		</nav>
		<form action=""></form>
	</div>


@endsection