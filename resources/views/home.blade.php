@extends('layouts.main')
@section('style')
@parent
<link rel="stylesheet" href="{{asset('src/css/carousel.css')}}">

@parent
@endsection
@section('content-body')
<div class="carousel">
    <div class="carousel-inner" height="150px">
        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="carousel-item">
            <img src="{{ asset('src/img/layouts/banner4.jpeg') }}" class="w-full" height="">
        </div>
        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item">
            <img src="{{ asset('src/img/layouts/banner3.jpg') }}" class="w-full" height="">
        </div>
        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item">
            <img src="{{ asset('src/img/layouts/banner2.jpg') }}" class="w-full" height="">
        </div>
        <label for="carousel-3" class="carousel-control prev control-1">‹</label>
        <label for="carousel-2" class="carousel-control next control-1">›</label>
        <label for="carousel-1" class="carousel-control prev control-2">‹</label>
        <label for="carousel-3" class="carousel-control next control-2">›</label>
        <label for="carousel-2" class="carousel-control prev control-3">‹</label>
        <label for="carousel-1" class="carousel-control next control-3">›</label>
        <ol class="carousel-indicators">
            <li>
                <label for="carousel-1" class="carousel-bullet">•</label>
            </li>
            <li>
                <label for="carousel-2" class="carousel-bullet">•</label>
            </li>
            <li>
                <label for="carousel-3" class="carousel-bullet">•</label>
            </li>
        </ol>
    </div>
</div>
<div class="w-full h-12 bg-black opacity-25"></div>
<div class="m-2"></div>
<div class="flex  w-full h-auto flex-shrink-0 pr-1 pl-1">
    <div class="inset-y-0 left-0 bg-black bg-opacity-25 h-auto w-2/3 p-3">
        <div class="w-full text-flugreen-500 text-center text-3xl border-2 py-3 px-2 p-3 border-gray-600
            bg-red-800">
            <span >Ofertas</span>
        </div>
        <div class="m-6"></div>
        <div class="flex w-full flex-none justify-center ">
            <div class="flex flex-shrink-0 justify-center p-5 items-center">
                @if ($offertsHome->hasPages())
                    @if (!$offertsHome->onFirstPage())
                    <div class="flex-none">
                        <a href="{{ $offertsHome->previousPageUrl() }}" class="px-2 py-3 text-flugreen-500
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
                        Página {{ "{$offertsHome->currentPage()} de {$offertsHome->lastPage()}" }}
                    </div>
                    @if ($offertsHome->hasMorePages())
                    <div class="flex-none">
                        <a href="{{ $offertsHome->nextPageUrl() }}" class="px-2 py-3 text-flugreen-500
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
        <div class="text-flugreen-500 text-center text-">
            @foreach ($offertsHome as $item)
                <div class="flex flex-wrap  rounded-md border-2 border-gray-600 justify-center
                    p-2 cursor-pointer">
                    <a href="{{ route('show.offerHome',$item->id) }}" class="">
                        <div class="flex justify-center flex-col items-center">
                            <img src="{{ asset('storage/src/img/product-images/'.$item->product->photo1) }}" 
                            width="250px" height="150px">
                            <span class="text-flugreen-500">{{$item->description}}</span>
                        </div>
                    </a>
                </div>
                <div class="m-3"></div>
            @endforeach
        </div>
        <div class="flex w-full flex-none justify-center ">
            <div class="flex flex-shrink-0 justify-center p-5 items-center">
                @if ($offertsHome->hasPages())
                    @if (!$offertsHome->onFirstPage())
                    <div class="flex-none">
                        <a href="{{ $offertsHome->previousPageUrl() }}" class="px-2 py-3 text-flugreen-500
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
                        Página {{ "{$offertsHome->currentPage()} de {$offertsHome->lastPage()}" }}
                    </div>
                    @if ($offertsHome->hasMorePages())
                    <div class="flex-none">
                        <a href="{{ $offertsHome->nextPageUrl() }}" class="px-2 py-3 text-flugreen-500
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

    <div class="m-2"></div>

    <div class="flex flex-col inset-y-0 left-0 bg-black bg-opacity-25 h-full w-full items-center
        justify-center">
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
        @foreach ($productsHome as $item)
        <div class="flex flex-wrap  w-auto rounded-md border-2 border-gray-600 justify-center p-2 cursor-pointer">
            <a href="{{ route('show.productHome', $item->id) }}" class="">
                <div class="flex justify-center flex-col">
                    <img src="{{ asset('storage/src/img/product-images/'.$item->photo1) }}" 
                    width="250px" height="150px">
                    <span class="text-flugreen-500">{{$item->name}}</span>
                </div>
            </a>
        </div>
            <div class="m-2"></div>
        @endforeach
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
</div>
@endsection
{{-- 
<div >
                    
                    {{$productsHome->links()}}
                </div> --}}
@section('scrippt')
@parent
    
    {{-- @dd(session('error')) --}}
    @if (session('error'))
        <script>Swal.fire("estado..!","{{session('error')}}","warning");</script>
    @endif
    @if (session('remove'))
        <script>Swal.fire("estado..!","{{session('remove')}}","success");</script>
    @endif
    @if (session('clear'))
        <script>Swal.fire("estado..!","{{session('clear')}}","info");</script>
    @endif
    @if (session('vacio'))
        <script>Swal.fire("estado..!","{{session('vacio')}}","warning");</script>
    @endif
    @if (session('compra'))
        <script>Swal.fire("Exito","{{session('compra')}}","success");</script>
    @endif
    
@endsection