@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Clientes</h1>
@stop

@php
    $heads = ['ID','NOMBRE', 'APELLIDO','DOCUMENTO','ESTADO','OPCIONES']
@endphp
@section('content')
<x-adminlte-datatable id="table1" :heads="$heads">

</x-adminlte-datatable>
@stop