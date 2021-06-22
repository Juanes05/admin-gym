@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@php
    $heads = ['NOMBRE', 'APELLIDO','DOCUMENTO','ESTADO',

    ['label'=> 'OPCIONES','no-export'=> true],
];

    
$config = [
  
    'order' => [[0, 'asc']],
    'columns' => [null, null, null,null, ['orderable' => false]],
];
@endphp
@section('content')
<x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped hoverable bordered compressed>

    @foreach ($customers as $customer)
 

   
    <tr>
     
   

   
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
                
                
                <i class="fa fa-lg fa-fw fa-pen" title="Editar usuario"></i>
                
            </a>
            
            <a href="{{route('create-by-id',$customer->id)}}" class="btn btn-success"> 
                
                
                Agregar pago
                
            </a>
            
            <a href="{{route('show-pays-by-id',$customer->id)}}" class="btn btn-info"> 
                
                
                Ver pagos
                
            </a>
            
            <form class="mt-3" action="{{ route('customers.destroy', $customer)}}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
             
                    
                    <button class="btn btn-default text-danger mx-1 shadow" title="Borrar usuario">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
            
                
            </form>
            
            
            
                
        </td>
        
    </tr>


   


        
    @endforeach

    
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('status_destroy'))
<div class="alert alert-warning">
    {{ session('status_destroy') }}
</div>
@endif
  

</x-adminlte-datatable>

@stop

@section('css')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>




@stop