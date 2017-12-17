@extends('welcome')


@section('content')

<div class="container ">
    <div class="row" >
    	
	    @foreach($item as $product)
	        <div class="col-lg-6 col-md-12 items-all ml-auto " >
				<img title=" " alt="{{ $product->name }} " src="https://placehold.it/500x400" id="items-picture">		
				
			</div>
			<div class="col-lg-6 col-md-12 items-all mr-auto" >
				<h5><STRONG>Nombre:</STRONG> {{ $product->name}}</h5>
				<h5><strong>Precio:</strong> {{ number_format($product->price, 2, ',','.') }} </h5>
				<h5>&nbsp;<strong>Stock:</strong> {{ number_format($product->stock, 2, ',', '.') }}</h5>
				<strong>Descripción: </strong>
				<p>{{ $product->description }}</p>
			</div>
		@endforeach
    </div>
</div>

@endsection