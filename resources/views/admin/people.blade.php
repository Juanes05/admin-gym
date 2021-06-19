@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Clientes</h1>
@stop

@php
    $heads = ['ID','NOMBRE', 'APELLIDO','DOCUMENTO','ESTADO',

    ['label'=> 'OPCIONES','no-export'=> true],
];

    
$config = [
  
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, null,null, ['orderable' => false]],
];
@endphp
@section('content')
<x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped hoverable bordered compressed>

    @foreach ($customers as $customer)
 

   
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
            
            <a href="#" class="btn btn-info"> 
                
                
                Ver pagos
                
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


 
  
   


        
    @endforeach

</x-adminlte-datatable>

@stop

@section('css')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>




@stop