@extends('welcome')


@section('content')

<div class="container ">
    <div class="row" >
    	
	    @foreach($item as $product)
	        <div class="col-lg-6 col-md-12 items-all ml-auto " >
				<img title=" " alt="{{ $product->name }} " src="https://placehold.it/500x400" id="items-picture" class="img-fluid"> 
			</div>
			<div class="col-lg-6 col-md-12 items-all mr-auto" >
				<h5><STRONG>Nombre:</STRONG> {{ $product->name}}</h5>
				<h5><strong>Precio:</strong> {{ number_format($product->price, 2, ',','.') }} </h5>
				<h5>&nbsp;<strong>Stock:</strong> {{ number_format($product->stock, 2, ',', '.') }}</h5>
				<strong>Descripción: </strong>
				<p>{{ $product->description }}</p>
				<form action="{{ route('cart.store') }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{$product->id}}">
					<input type="hidden" name="name" value="{{$product->name}}">
					<strong>Cantidad:</strong><input type="number" name="qty" value="1">
					<input type="hidden" name="price" value="{{$product->price}}">
					
					<div class="inline-form">
						<br>
						<button class="btn btn-outline-default my-2 my-sm-0" type="submit">Añadir</button>
						<a class="btn btn-outline-default my-2 my-sm-0" href="{{ url()->previous() }}">Volver</a>
					</div>
				</form>
				
				
				
				
			</div>
		@endforeach
    </div>
</div>

@endsection