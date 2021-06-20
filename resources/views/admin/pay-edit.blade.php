@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Editar pago </h1>

   
@stop


@section('content')

<div>

    <form action="{{route('pays.update',$pay)}}" method="POST">

        <div class="form-group">

      
            @csrf
            @method('PUT')

     
            
            <label class="mt-2"> Pago $ </label>
            <input class="form-control w-50 rounded-md shadow-sm" type="numeric" name="pay"  required=true value="{{$pay->pay}}">

                    
            <label class="mt-2" >Referencia de Pago</label>
            <input class="form-control w-50  rounded-md shadow-sm" type="text" name="pay_reference"  value="{{$pay->pay_reference}}">


            
           
            
            <input type="submit" class="btn btn-primary mt-3" value="Crear">
            <a class="btn btn-warning mt-3" href="{{route('pays.index') }}" role="button">Volver</a>
           
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