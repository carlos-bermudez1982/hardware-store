@extends('extranet.adminlayout')


@section('content')
<div class="container">
		<div class="row">
			<h1 style="width: 100%;">Agregar Articulo</h1>
			<form action="{{ route('product.store') }}" method="POST">
				{!! csrf_field() !!}
				{{-- {!! method_field('PUT') !!} --}}
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
						<option disabled selected>Seleccionar Categoria</option>
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