@extends('layouts.perfil-main')
@section('content-body')
<div class="p-6">
    <div class="pb-4">
        <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ url('product/create') }}">Nuevo producto</a>
            <a class="bg-flugreen-500 border-solid border-2 font-bold text-md
                  border-black py-2 px-2 rounded hover:bg-black hover:text-flugreen-500" 
            href="{{ route('product.restore') }}">Ver productos desactivados</a>
    </div>
    <div class="flex flex-1 text-xl bg-gray-700 text-black rounded justify-center p-2">
        {{ $products->total() }} Registros
   </div>
    <table class="table-fixed bg-gray-700 w-full h-auto text-center text-md rounded-md border-t-2 border-black">
        <thead>
          <tr>
            <th class="w-12 px-4 py-2 border-r-2  border-b-2 border-black"> Nª </th>
            <th class="w-1/3 px-4 py-2 border-r-2  border-b-2 border-black">Nombre</th>
            <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Descripción</th>
            <th class="w-1/3 px-4 py-2 border-r-2  border-b-2 border-black">Sub Categoria</th>
            <th class="w-1/3 px-4 py-2 border-r-2  border-b-2 border-black">Foto</th>
            <th class="w-1/3 px-4 py-2 border-b-2 border-black">Accion</th>
          </tr>
        </thead>
        <tbody>
            @if ($products->total() == 0)
                <tr>
                    <td colspan="6" class="text-xl uppercase">No hay registros</td>
                </tr>
            @endif
            @foreach ($products as $value)
                <tr class="text-center">
                    <td class="border-r-2 border-black px-4 py-2">{{$loop->iteration}} </td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->name }}</td>
                    <td class="border-r-2 border-black px-4 py-2">{{ $value->description }}</td>
                    <td class="border-r-2 border-black px-4 py-2">
                        {{ $value->find($value->id)->subCategory->name }}
                    </td>
                    <td class="flex border-r-2 border-black px-4 py-2 justify-center">
                        <img src="{{asset("storage/src/img/product-images/{$value->photo1}")}}" alt="" 
                        width="50px" height="50px">
                    </td>
                    <td>
                        <div class="flex flex-wrap flex-shrink-0 justify-center">
                            <form action="{{ route('product.edit', $value->id  ) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button title="Editar" class="bg-green-600 border-2 border-gray-800 
                                rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 " 
                                type="submit">
                                    <img src="{{asset("src/img/forms/edit.png")}}" alt="" 
                                    width="25px" height="25px" >
                                </button>
                            </form>
                            <div class="m-2"></div>
                            <form action="{{ route('product.destroy',$value->id) }}" method="POST"
                                onsubmit="return confirm('¿Realmente quieres desabilitar este producto?');">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button title="Desabilitar" class="bg-red-800 border-2 border-gray-800 
                                rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 " 
                                type="submit">
                                    <img src="{{asset("src/img/forms/desabilitar.png")}}" alt="" 
                                    width="25px" height="25px" >
                                </button>
                            </form>
                            <div class="m-2"></div>
                            <form action="{{ route('product.show',$value->id) }}" method="POST">
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
                        @if ($products->hasPages())
                            @if (!$products->onFirstPage())
                            <div class="flex-none">
                                <a href="{{ $products->previousPageUrl() }}" class="px-2 py-3 
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
                                Página {{ "{$products->currentPage()} de {$products->lastPage()}" }}
                                {{-- {!! $products->render()!!} --}}
                            </div>
                            @if ($products->hasMorePages())
                            <div class="flex-none">
                                <a href="{{ $products->nextPageUrl() }}" class="px-2 py-3 
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