@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Editar usuario  </h1>

   
@stop


@section('content')

<div>

    <form action="{{route('customers.update',$customer)}}" method="POST">

        <div class="form-group">

      
            @csrf
            @method('PUT')
            
            <label class="mt-2"> Nombre </label>
            <input class="form-control w-50 rounded-md shadow-sm" type="text" name="name" value="{{$customer->name}}">

                    
            <label class="mt-2" > Apellido</label>
            <input class="form-control w-50  rounded-md shadow-sm" type="text" name="lastname" value="{{$customer->lastname}}">


            
            
            <label class="mt-2"> Documento </label>
            <input class="form-control w-50  rounded-md shadow-sm" type="number" name="document" value="{{$customer->document}}">
            
            <input type="submit" class="btn btn-primary mt-3" value="Editar">
            <a class="btn btn-warning mt-3" href="{{route('customers.index') }}" role="button">Volver</a>
           
        </div>
    </form>
</div>


@stop