@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Agregar usuario  </h1>

   
@stop


@section('content')

<div>

    <form action="{{route('customers.store')}}" method="POST">

        <div class="form-group">

      
            @csrf
            @method('POST')
            
            <label class="mt-2"> Nombre </label>
            <input class="form-control w-50 rounded-md shadow-sm" type="text" name="name"  required=true >

                    
            <label class="mt-2" > Apellido</label>
            <input class="form-control w-50  rounded-md shadow-sm" type="text" name="lastname" >


            
            
            <label class="mt-2"> Documento </label>
            <input class="form-control w-50  rounded-md shadow-sm" type="number" name="document"  required=true>
            
            <input type="submit" class="btn btn-primary mt-3" value="Crear">
            <a class="btn btn-warning mt-3" href="{{route('customers.index') }}" role="button">Volver</a>
           
        </div>
    </form>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@stop