@extends('extranet.adminlayout')

@section('content')

	<div class="container">
		<div class="row">
			<h1>Articulos En Sistema</h1>
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
							<td colspan="3">
								<a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary"> 
									Modificar
								</a>
								<form action="{{ route('product.destroy', $item->id) }}" method="POST">
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
	<div class="container mr-auto" >
	
		<nav aria-label="Items navigation">
			{!! $items->render() !!}
		</nav>
	</div>

	<br>
	<div class="container">
		<div class="row">
			<h1 style="width: 100%;">Agregar Articulo</h1>
			<form action="{{ route('product.store') }}" method="POST">
				{!! csrf_field() !!}
				{{-- {!! method_field('POST') !!} --}}
				<div class="form-group">
					<label for="name" class="form-label">Articulo</label>
					<input type="text" name="name" placeholder="Nombre del Articulo"  class="form-control">
					{!! $errors->first('name', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="price">Precio</label>
					<input type="number" name="price" min="1" class="form-control">
					{!! $errors->first('price', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="price">Stock</label>
					<input type="number" name="stock" min="1" class="form-control">
					{!! $errors->first('stock', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="description">Descripcion del Producto</label>
					<textarea cols="50" rows="10" placeholder="Descripcion del Articulo" class="form-control" name="description"></textarea>
					{!! $errors->first('description', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<label for="Categoria" class="form-label">Categoria</label>
					<select name="category_id" class="form-control">
						<option disabled selected></option>
						@foreach(app('App\Http\Controllers\CategoryController')->index() as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
					{!! $errors->first('category_id', '<p class="error">:message</p>') !!}
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>


@endsection