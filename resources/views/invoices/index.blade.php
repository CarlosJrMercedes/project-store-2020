@extends('layouts.perfil-main')
@section('content-body')
<div class="p-6">
    <div class="pb-4">
        <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ route('categories.create') }}">Nueva Categoria</a>
            <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ route('categories.restore') }}">Ver categorias desactivados</a>
    </div>
    <div class="flex flex-1 text-xl bg-gray-700 text-black rounded justify-center p-3">
        {{ $invoices->total() }} Registros
   </div>
    <table class="table-fixed bg-gray-700 w-full h-auto text-center rounded-md border-t-2 border-black">
        <thead>
          <tr>
            <th class="w-12 px-4 py-2 border-r-2  border-b-2 border-black"> Nª </th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Cliente</th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">total compra</th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Fecha</th>
            <th class="w-1/2 px-4 py-2 border-b-2 border-black">Accion</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                @if ($invoices == "")
                    <td colspan="6" class="text-xl uppercase">No hay registros</td>
                @endif
            </tr>
            @foreach ($invoices as $value)
                <tr class="text-center">
                    <td class="border-r-2 border-black px-4 py-2">{{$loop->iteration}}</td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->usuario->email }}</td>
                    <td class="border-r-2 border-black px-4 py-2">${{ $value->total_invoice }}</td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->created_at }}</td>
                    <td>
                        <div class="flex flex-wrap flex-shrink-0 justify-center">
                            <form action="{{ route('invoice.show',$value->id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button title="Ver" class="bg-red-800 border-2 border-gray-800 
                                rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 " 
                                type="submit">
                                    <img src="{{asset("src/img/forms/ver.png")}}" alt="" 
                                    width="25px" height="25px" >
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6">
                    <div class="flex flex-shrink-0 justify-center p-5 items-center">
                        @if ($invoices->hasPages())
                            @if (!$invoices->onFirstPage())
                            <div class="flex-none">
                                <a href="{{ $invoices->previousPageUrl() }}" class="px-2 py-3 
                                    border-2 border-black hover:border-blue-600 hover:text-blue-500">
                                    <- ANTERIOR
                                </a>
                            </div>
                            @else
                            <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-500
                            cursor-not-allowed hover:border-red-800 hover:text-red-800">
                                <- ANTERIOR
                            </div>
                            @endif
                            <div class="mr-2 ml-2 flex-none px-2 py-3">
                                Página {{ "{$invoices->currentPage()} de {$invoices->lastPage()}" }}
                            </div>
                            @if ($invoices->hasMorePages())
                            <div class="flex-none">
                                <a href="{{ $invoices->nextPageUrl() }}" class="px-2 py-3 
                                    border-2 border-black hover:border-blue-600 hover:text-blue-500">
                                    SIGUIENTE ->
                                </a>
                            </div>
                            @else
                            <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-500
                            cursor-not-allowed hover:border-red-800 hover:text-red-800">
                                SIGUIENTE ->
                            </div>
                            @endif
                        @endif

                    </div>
                </td>
            </tr>
        </tbody>
      </table>
</div>
@endsection
@section('scrippt')
@parent
    
    
    @if (session('exito'))
        <script>Swal.fire("Exito","Proceso realizado sastifactoriamente","success");</script>            
        @endif
        
    @if (session('failed'))   
        <script>Swal.fire("ERROR","No se pudo realizar el proceso","error");</script>
    @endif
    
@endsection