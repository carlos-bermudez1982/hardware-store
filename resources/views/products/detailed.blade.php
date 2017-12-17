@extends('welcome')


@section('content')

<div class="container form-inline">
    @foreach ($items as $item)
        <div class="col-lg-4 col-md-6 items-all">
			<a href="{{ route('item.show', $item->id) }}"><img title=" " alt="{{ $item->name }} " src="https://placehold.it/250x200" id="items-picture"></a>		
			<p>Nombre: {{ $item->name}}</p>
			<h5>Precio: {{ number_format($item->price, 2, ',','.') }} </h5>
			<h5>&nbsp;Stock: {{ number_format($item->stock, 2, ',', '.') }}</h5>
		</div>
    @endforeach
</div>
<div class="container mr-auto" >
	
	<nav aria-label="Items navigation">
		{!! $items->render() !!}
	</nav>
</div>

@endsection