@extends('layouts.main')

@section('content-body')
<div class="flex flex-wrap w-auto h-auto bg-gray-800 opacity-24 border-2 border-gray-700
rounded-md">
    <div class="flex-initial w-full text-uppercase text-3xl text-center">
        <span><strong>{{$offer->name}}</strong></span>
    </div>
</div>
<div class="mt-2"></div>
<div class="flex flex-wrap">
    <div class="w-1/2">
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-5
        rounded-md text-2xl h-32">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Descripción :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>{{$offer->description}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-5
             rounded-md text-2xl h-32">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Sub categoria :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>{{$offer->product->name}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-5
             rounded-md text-xl h-32">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Precio oferta :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>${{$offer->offer_price}}</p>
                    </div>
                </div>
            </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl h-20">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Enpieza :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>${{$offer->start}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl h-20">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Termina :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>${{$offer->end}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl justify-center items-center">
            <div class="flex flex-wrap -mx-3 mb-6 ">
                @auth
                    <a class="bg-red-800 border-2 border-gray-800 
                        rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                        title="Agregar a carrito" href="{{ route('cart.addOffer', $offer->id) }}">
                        <img src="{{ asset('src/img/forms/addcarrito.png') }}" width="50px" height="50px">
                    </a>
                @endauth
                <div class="m-2"></div>
               
                <a title="Cancelar" class="flex bg-blue-800 border-2 border-gray-800 
                rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase items-center" 
                type="submit" href="{{ route('index')}}">
                    regresar
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap w-1/2 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
    rounded-md text-2xl justify-center items-center" >
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex w-full md:w-full px-3 mb-6 md:mb-0 justify-center items-center">
                <img src="{{asset("storage/src/img/product-images/{$offer->product->photo1}")}}" 
                width="70%">
            
            </div>
        </div>
    </div>
    
</div>

@endsection
@section('scrippt')
@parent
    @if (session('exito'))
        <script>Swal.fire("Exito","{{session('exito')}}","success");</script>
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