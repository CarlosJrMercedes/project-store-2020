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
<div class="w-full h-full bg-black bg-opacity-25">
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
<div class="m-2"></div>

<div class="flex bg-black bg-opacity-25 w-full flex-shrink-0 pr-1 pl-1 py-3">
    <div class="flex flex-col w-2/3 p-3 items-center" >
        <div class="w-full text-flugreen-500 text-center text-3xl border-2 py-3 px-2 p-3 border-gray-600
            bg-red-800">
            <span >Ofertas</span>
        </div>
        <div class="m-6"></div>
        @foreach ($offertsHome as $item)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('storage/src/img/product-images/'.$item->product->photo1) }}" 
                alt="Sunset in the mountains" style="height: 350px;" >
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-blue-500"><strong>{{$item->product->name}}</strong></div>
                    <p class="text-flugreen-500">
                        {{$item->description}}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold 
                    text-gray-700 mr-2 mb-2"><a href="{{ route('show.offerHome', $item->id) }}">Ver</a></span>
                    
                </div>
            </div>
        @endforeach
    </div>

    <div class="m-2"></div>

    <div class="flex flex-col inset-y-0 left-0 bg-black bg-opacity-25 h-full w-full items-center
        justify-center">
        <div class="flex grid grid-cols-2 items-center justify-center">
            @foreach ($productsHome as $item)
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('storage/src/img/product-images/'.$item->photo1) }}" 
                alt="Sunset in the mountains" style="height: 350px;" >
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-blue-500"><strong>{{$item->name}}</strong></div>
                    <p class="text-flugreen-500">
                        {{$item->description}}
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold 
                    text-gray-700 mr-2 mb-2"><a href="{{ route('show.productHome', $item->id) }}">Ver</a></span>
                    
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




<div class="m-3"></div>
<div class="w-full bg-black bg-opacity-25">
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
        <script>
            var invoiceId = "{{session('compra')}}";
            Swal.fire("Exito","Gracias! El pago a través de PayPal se ha ralizado correctamente.","success");

            window.open("{{url('invoice/'.session('compra'))}}");
        </script>
    @endif
    @if (session('status'))
        <script>Swal.fire("estado..!","{{session('status')}}","warning");</script>
    @endif
@endsection