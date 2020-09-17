@extends('layouts.main')
@section('content-body')
<div class="flex w-full flex-none justify-center ">
        <div class="flex flex-shrink-0 justify-center p-5 items-center">
            @if ($productsHome->hasPages())
                @if (!$productsHome->onFirstPage())
                <div class="flex-none">
                    <a href="{{ $productsHome->previousPageUrl() }}" class="px-2 py-3 text-flugreen-500
                        border-2 border-flugreen-500 hover:border-blue-600 hover:text-blue-500">
                        <- ANTERIOR
                    </a>
                </div>
                @else
                <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-600 
                cursor-not-allowed hover:border-red-800 hover:text-red-800">
                    <- ANTERIOR
                </div>
                @endif
                <div class="mr-2 ml-2 flex-none px-2 py-3 text-flugreen-500">
                    Página {{ "{$productsHome->currentPage()} de {$productsHome->lastPage()}" }}
                </div>
                @if ($productsHome->hasMorePages())
                <div class="flex-none">
                    <a href="{{ $productsHome->nextPageUrl() }}" class="px-2 py-3 text-flugreen-500
                        border-2 border-flugreen-500 hover:border-blue-600 hover:text-blue-500">
                        SIGUIENTE ->
                    </a>
                </div>
                @else
                <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-600
                cursor-not-allowed hover:border-red-800 hover:text-red-800">
                    SIGUIENTE ->
                </div>
                @endif
            @endif
        </div>
    </div>
</div>
<div class="flex grid grid-cols-2 items-center justify-center pr-56 pl-56">

        @foreach ($productsHome as $item)   
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ asset('storage/src/img/product-images/'.$item->photo1) }}" 
            alt="Sunset in the mountains" style="height: 350px;" >
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">{{$item->name}}</div>
              <p class="text-flugreen-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
              </p>
            </div>
            <div class="px-6 pt-4 pb-2">
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold 
                text-gray-700 mr-2 mb-2"><a href="{{ route('show.productHome', $item->id) }}">Ver</a></span>
               
            </div>
          </div>
        @endforeach
    </div>
    <div class="m-2"></div>
</div>
<div class="flex w-full flex-none justify-center ">
    <div class="flex flex-shrink-0 justify-center p-5 items-center">
        @if ($productsHome->hasPages())
            @if (!$productsHome->onFirstPage())
            <div class="flex-none">
                <a href="{{ $productsHome->previousPageUrl() }}" class="px-2 py-3 text-flugreen-500
                    border-2 border-flugreen-500 hover:border-blue-600 hover:text-blue-500">
                    <- ANTERIOR
                </a>
            </div>
            @else
            <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-600 
            cursor-not-allowed hover:border-red-800 hover:text-red-800">
                <- ANTERIOR
            </div>
            @endif
            <div class="mr-2 ml-2 flex-none px-2 py-3 text-flugreen-500">
                Página {{ "{$productsHome->currentPage()} de {$productsHome->lastPage()}" }}
            </div>
            @if ($productsHome->hasMorePages())
            <div class="flex-none">
                <a href="{{ $productsHome->nextPageUrl() }}" class="px-2 py-3 text-flugreen-500
                    border-2 border-flugreen-500 hover:border-blue-600 hover:text-blue-500">
                    SIGUIENTE ->
                </a>
            </div>
            @else
            <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-600
            cursor-not-allowed hover:border-red-800 hover:text-red-800">
                SIGUIENTE ->
            </div>
            @endif
        @endif
    </div>
</div>
@endsection