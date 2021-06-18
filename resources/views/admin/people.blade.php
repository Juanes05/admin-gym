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

    @forelse ($customers as $customer)

    <tr>
        <td>
            {{ $customer->id }}
        </td>

        <td>
            {{ $customer->name}}
        </td>

        <td>
            {{ $customer->lastname}}
        </td>

        <td>
            {{ $customer->document}}
        </td>

        <td>

            @if ($customer->state)
                
                    Activo
            @else
                Inactivo    

            @endif
        </td>

        <td>

            <a href="{{route('customers.edit',$customer) }}" class="btn btn-dark"> 


                Editar
    
              </a>
    
              <a href="#" class="btn btn-success"> 
    
    
                Agregar pago
    
              </a>
           
          <form class="mt-3" action="{{ route('customers.destroy', $customer)}}" method="POST">
            @csrf
            {{ method_field('DELETE') }}
           <div class="form-group">
            
               <input type="submit" class="btn btn-danger delete-user" value="Borrar usuario">
            </div>
          
          </form>

         

          
        </td>
      
    </tr>

    @empty
    <tr>
        <td colspan="2">
            No hay clientes creados
        </td>
    </tr>

   


        
    @endforelse

</x-adminlte-datatable>
@stop