@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Lista de Pagos</h1>
@stop

@php
    $heads = ['ID','NOMBRE', 'DOCUMENTO','ÚLTIMO PAGO','FECHA PAGO',

    ['label'=> 'OPCIONES','no-export'=> true],
];

    

@endphp
@section('content')
<x-adminlte-datatable id="table1" :heads="$heads"  striped hoverable bordered compressed>

    @foreach ($pays as $pay)
 

   
    <tr>
        <td>
            {{ $pay->id }}
        </td>
   

   
        <td>
            {{ $pay->customer->name }}
        </td>
        
    

    
        <td>
            {{ $pay->customer->document}}
        </td>
        
  

        <td>
       @money($pay->pay,'COP')
        </td>
        
        <td>
            {{ $pay->created_at}}
        </td>
        
  
    
        
  
        <td>
            
            <a href="{{route('pays.edit',$pay) }}" class="btn btn-dark"> 
                
                
                Editar
                
            </a>
         
            
            <form class="mt-3" action="{{ route('pays.destroy', $pay)}}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <div class="form-group">
                    
                    <input type="submit" class="btn btn-danger delete-user" value="Borrar pago">
                </div>
                
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
<div class="alert alert-danger">
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