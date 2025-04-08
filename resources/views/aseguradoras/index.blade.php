@extends('layouts.app')

@section('content')
    <h1>Lista de Aseguradoras</h1>
    <ul>
        @foreach ($aseguradoras as $aseguradora)
            <li>{{ $aseguradora->descripcion }} - {{ $aseguradora->estado }}</li>
        @endforeach
    </ul>
@endsection
