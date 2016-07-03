@extends('react-spark-vendor::appReact')

@section('title')

	Darren Merrett's React for Spark

@endsection

@section('content')

	<reactsparkapp></reactsparkapp>

@endsection

@section('footer-scripts')
	
	@yield('footer-scripts')

	<link href="{{ elixir('css/reactApp.css') }}" rel="stylesheet">
	<script src="{{ elixir('js/reactApp.js') }}"></script>

@endsection
