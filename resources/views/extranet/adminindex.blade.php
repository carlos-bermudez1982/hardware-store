@extends('extranet.adminlayout')


@section('content')

@if(Auth::check()) 
	<div class="container">
		<div class="row">
			
			<h1>Bienvenido al area de administracion.</h1>
		</div>
	</div>
@else

	{{-- añadir redireccion al index o login --}}

@endif

@endsection