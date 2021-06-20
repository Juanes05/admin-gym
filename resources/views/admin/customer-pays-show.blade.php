@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1>Historial de Pagos : {{$customer->name}}</h1>
@stop

@php
    $heads = ['ID','PAGO','REFERENCIA DE PAGO','FECHA PAGO',

    ['label'=> 'OPCIONES','no-export'=> true],
];

    

@endphp
@section('content')
<x-adminlte-datatable id="table1" :heads="$heads"  striped hoverable bordered compressed>

   
    @forelse ($customer->pays as $pay)

   
    <tr>
        <td>
            {{ $customer->id }}
        </td>
      
       

        <td>
            @money($pay->pay,'COP')
        </td>

        <td>
            {{ $pay->pay_reference}}
        </td>
        
        <td>
            {{ $pay->created_at}}
        </td>

  
    
        
  
        <td>
            
            <a href="{{route('pays.edit',$pay->id) }}" class="btn btn-dark"> 
                
                
                Editar
                
            </a>
         
          
            
            
            
        </td>


        
        @empty

        <td>
             No registra pagos
        </td>
        
   

        @endforelse
        
    </tr>


 
  
   


        
  

</x-adminlte-datatable>

@stop

@section('css')
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>




@stop