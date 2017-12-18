@extends('extranet.adminlayout')

@section('content')
	<div class="page-header">
		<h1>Mensaje de  {{ $message->name }} 
			<small>( {{ $message->email }} )</small>
		</h1>
		<p>{{ $message->message }}</p>
		
	</div>
	<a class="btn btn-default" href="{{ url()->previous() }}" >Volver</a>

@stop