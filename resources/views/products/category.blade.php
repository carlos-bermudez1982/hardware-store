@extends('welcome')


@section('content')

<div class="container">
	<div class="category col-md-4">
		<h2>Categoria {{ $category->name }}</h2> 
	</div>
		
		<div class="products form-inline">
			@foreach(app('App\Http\Controllers\ItemController')->showItemByCategory($category->id) as $items)
			<div class="col-md-4 items-all">
				<a href="{{ route('item.show', $items->id) }}"><img title=" " alt="{{ $items->name }} " src="https://placehold.it/250x200" id="items-picture"></a>		
				<p>Nombre: {{ $items->name}}</p>
				<h5>Precio: {{ number_format($items->price, 2, ',','.') }} </h5>
				<h5>&nbsp;Stock: {{ number_format($items->stock, 2, ',', '.') }}</h5>
			</div>
			@endforeach
		</div>

</div>
<div class="container mr-auto" >
	
	<nav aria-label="Items navigation">
		{{-- {{$items}} --}}
		{{-- {!! $items->links() !!} --}}
		
	</nav>
</div>

@endsection