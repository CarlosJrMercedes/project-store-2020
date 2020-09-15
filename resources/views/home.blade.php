@extends('layouts.main')

@section('style')

@parent
    <style>

        .carousel {
            position: relative;
            box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
        }

        .carousel-inner {
            position: relative;
            overflow: hidden;
            height: 500px;
        }

        .carousel-open:checked + .carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            position: absolute;
            opacity: 0;
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        .carousel-item img {
            display: block;
        }

        .carousel-control {
            background: rgba(0, 0, 0, 0.28);
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            display: none;
            font-size: 40px;
            height: 40px;
            line-height: 35px;
            position: absolute;
            top: 50%;
            -webkit-transform: translate(0, -50%);
            cursor: pointer;
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
            text-align: center;
            width: 40px;
            z-index: 10;
        }

        .carousel-control.prev {
            left: 2%;
        }

        .carousel-control.next {
            right: 2%;
        }

        .carousel-control:hover {
            background: rgba(0, 0, 0, 0.8);
            color: #aaaaaa;
        }

        #carousel-1:checked ~ .control-1,
        #carousel-2:checked ~ .control-2,
        #carousel-3:checked ~ .control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        .carousel-indicators li {
            display: inline-block;
            margin: 0 5px;
        }

        .carousel-bullet {
            color: #fff;
            cursor: pointer;
            display: block;
            font-size: 35px;
        }

        .carousel-bullet:hover {
            color: #aaaaaa;
        }

        #carousel-1:checked ~ .control-1 ~ .carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked ~ .control-2 ~ .carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked ~ .control-3 ~ .carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #428bca;
        }

        #title {
            width: 100%;
            position: absolute;
            padding: 0px;
            margin: 0px auto;
            text-align: center;
            font-size: 27px;
            color: rgba(255, 255, 255, 1);
            font-family: 'Open Sans', sans-serif;
            z-index: 9999;
            text-shadow: 0px 1px 2px rgba(0, 0, 0, 0.33), -1px 0px 2px rgba(255, 255, 255, 0);
            }
    </style>
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
        <div class="w-full text-flugreen-500 text-center text-3xl border-2 py-3 px-2 p-3">
            <span >Ofertas</span>
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
                    <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-500 
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
                    <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-500
                    cursor-not-allowed hover:border-red-800 hover:text-red-800">
                        SIGUIENTE ->
                    </div>
                    @endif
                @endif

            </div>
        </div>
        @foreach ($productsHome as $item)
        <div class="flex flex-wrap  w-auto rounded-md border-2 border-gray-300 justify-center p-2 cursor-pointer">
            <a href="" class="">
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
                    <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-500 
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
                    <div class="flex-none py-3 px-2 text-gray-500 border-2 border-gray-500
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


@section('scrippt')
@parent
    
    {{-- @dd(session('error')) --}}
    @if (session('exito'))
        <script>Swal.fire("Exito","Proceso realizado sastifactoriamente","success");</script>            
    @endif

    @if (session('failed'))   
        <script>Swal.fire("ERROR","No se pudo realizar el proceso","error");</script>
    @endif
    @if (session('error'))
        <script>Swal.fire("Error","{{session('error')}}","error");</script>
    @endif
    
@endsection
