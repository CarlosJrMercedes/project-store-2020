@extends('layouts.seller')

@section('content-body')
<div class="flex flex-1 text-xl bg-gray-700 text-flugreen-500 rounded justify-center">
    {{ $comments->total() }} Comentarios
</div>
<table class="table-fixed bg-gray-700 w-full h-auto text-center rounded-md border-t-2 border-black">
    <thead>
      <tr>
        <th class="w-12 px-4 py-2 border-r-2  border-b-2 border-black"> Nª </th>
        <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Comentario</th>
        <th class="w-1/2 px-4 py-2 border-r-2  border-b-2 border-black">Publicado</th>
        <th class="w-1/2 px-4 py-2 border-b-2 border-black">Accion</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            @if (!$comments->isNotEmpty() )
                <td colspan="6" class="text-xl uppercase">No hay registros</td>
            @endif
        </tr>
        @foreach ($comments as $value)
            <tr class="text-center">
                <td class="border-r-2 border-black px-4 py-2">{{$loop->iteration}}</td>
                <td class="border-r-2 border-black px-4 py-2">{{ $value->product->name }}</td>
                <td class="border-r-2 border-black px-4 py-2">{{ $value->created_at }}</td>
                <td>
                    <div class="flex flex-wrap flex-shrink-0 justify-center">
                        <form action="{{ route('show.seller') }}" method="post">
                            @csrf
                            <input type="text" name="product" value="{{ $value->id_product }}" readonly hidden>
                            <input type="text" name="comentario" value="{{ $value->id }}" readonly hidden>
                            <button title="Desabilitar" class="bg-green-600 border-2 border-gray-800 rounded-md py-1 px-2 
                            hover:bg-opacity-25 hover:border-blue-700 " type="submit">
                                <img src="{{asset("src/img/forms/edit.png")}}" alt="" 
                                width="18px" height="18px" >
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <div class="flex flex-shrink-0 justify-center p-5 items-center">
                    @if ($comments->hasPages())
                        @if (!$comments->onFirstPage())
                        <div class="flex-none">
                            <a href="{{ $comments->previousPageUrl() }}" class="px-2 py-3 
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
                            Página {{ "{$comments->currentPage()} de {$comments->lastPage()}" }}
                        </div>
                        @if ($comments->hasMorePages())
                        <div class="flex-none">
                            <a href="{{ $comments->nextPageUrl() }}" class="px-2 py-3 
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
@endsection