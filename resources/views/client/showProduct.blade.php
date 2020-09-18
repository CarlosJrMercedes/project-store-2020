@extends('layouts.main')

@section('content-body')
<div class="flex flex-wrap w-auto h-auto bg-gray-800 opacity-24 border-2 border-gray-700
rounded-md">
    <div class="flex-initial w-full uppercase text-3xl text-center text-flugreen-500 py-3">
        <span><strong>{{$product->name}}</strong></span>
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
                    <p>{{$product->description}}</p>
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
                    <p>{{$product->find($product->id)->subCategory->name}}</p>
                </div>
            </div>
        </div>
        <div class="flex w-full flex-shirink-0">
            <div class="flex flex-wrap w-1/2 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
             rounded-md text-xl h-40">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Precio :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>${{$product->price}}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap w-1/2 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
                rounded-md text-xl h-40">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Existencias :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>{{$product->quantity}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl justify-center items-center">
            <div class="flex flex-wrap -mx-3 mb-6 ">
                
                <a title="Cancelar" class="flex bg-blue-800 border-2 border-gray-800 
                    rounded-md py-2 px-2 hover:bg-opacity-25 hover:border-blue-700 uppercase items-center" 
                    type="submit" href="{{ route('index')}}">
                    regresar
                </a>
            <div class="m-2"></div>
                @auth
                <a class="flex border-2 border-gray-800 items-center
                    rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                    title="Agregar a carrito" href="{{ route('cart.add', $product->id) }}">
                    <img src="{{ asset('src/img/forms/addcarrito.png') }}" width="50px" height="50px">
                </a>
                <form action="{{ route('ratings.like', $product->id) }}" method="POST">
                    @csrf
                    <input type="text" name="ratings" value="1" readonly hidden>
                    <button class="border-2 border-gray-800 items-center
                        rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                        title="Agregar a carrito">
                        <img src="{{ asset('src/img/forms/like.png') }}" width="50px" height="50px">
                        <span class="inset-x-0 bottom-0 text-blue-700">{{$likes}}</span>
                    </button>
                </form>
                <form action="{{ route('ratings.like', $product->id)}}" method="POST">
                    @csrf
                    <input type="text" name="ratings" value="0" readonly hidden>
                    <button class="border-2 border-gray-800
                        rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-red-700 uppercase" 
                        title="Agregar a carrito">
                        <img src="{{ asset('src/img/forms/dislike.png') }}" width="50px" height="50px">
                        <span class="inset-x-0 bottom-0 text-red-700">{{$disLikes}}</span>
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
    <div class="flex flex-wrap w-1/2 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
    rounded-md text-2xl justify-center items-center " >
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex w-full md:w-full px-3 mb-6 md:mb-0 justify-center items-center">
                <img src="{{asset("storage/src/img/product-images/{$product->photo1}")}}" style="height: 350px;">
            
            </div>
        </div>
    </div>
    <div class="w-full m-3"></div>
    <div class="flex w-full items-center justify-center text-2xl text-flugreen-500 uppercase 
    border-2 border-gray-700 rounded-md py-3">
        <p><strong>comentarios</strong></p>
    </div>

        @auth
        <div class="flex w-full items-center border-2 border-gray-700 rounded-md py-3">
            <form action="{{ route('new.comment',$product->id) }}" method="POST" 
                class="flex-1 items-center p-5">
                @csrf
                <div class="flex-1">
                    <textarea name="descripcion" id="description" 
                    class="bg-gray-800 appearance-none border-2 border-black 
                        rounded w-full py-1 px-1 text-flugreen-500  leading-tight 
                        focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                        >{{old('descripcion')}}</textarea>
                </div>
                <div>
                    @if ($errors->first('descripcion'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 w-full
                        rounded relative" role="alert" id="errorDescripcion">
                            <div class="flex flex-col">
                                <strong class="font-bold">Error!</strong>
                                <span class="block sm:inline">
                                    {{$errors->first('descripcion')}}
                                </span>
                            </div>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="closeDescripcion">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" 
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 
                                    1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 
                                    8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 
                                    1.2 0 0 1 0 1.698z"/>
                                </svg>
                            </span>
                        </div>
                    @endif
                </div>
                <div class="m-2"></div>
                    <input type="submit" value="Comentar" title="Comentar" class="bg-black bg-opacity-25 
                    px-2 py-2 rounded-md cursor-pointer text-white uppercase hover:text-black 
                    hover:bg-gray-500"> 
            </form>
        </div>
        @endauth
    @if ($comentarios->isNotEmpty())
        @foreach ($comentarios as $item)
        <div class="flex w-full items-center justify-center pt-5">
            <div class="w-full pl-10 border-2 border-gray-700 
            rounded-md py-3">
            <span class="left-0 top-0 p-0">Comentario....</span>
            <span class="top-0 right-0 p-0">by....{{$item->usuarios->email}}</span>
                <p><strong>{{$item->comentario}}</strong></p>
            </div>

            @if ($item->respuestas->isNotEmpty())
            <div class="w-full pl-10 border-2 border-gray-700 
            rounded-md py-3">
            <span class="left-0 top-0 p-0">Respuesta....</span>
                @foreach ($item->respuestas as $relation)
                <span class="top-0 right-0 p-0">by....{{$relation->usuarios->email}}</span>
                <p><strong>{{$relation->answer}}</strong></p>
                @endforeach
            </div>
            @else
            <div class="w-full pl-10 border-2 border-gray-700 
            rounded-md py-3">
            <span class="left-0 top-0 p-0">Respuesta....</span>
                <p><strong>No hay respuesta</strong></p>
            </div>
            @endif
        </div>
        @endforeach    
    @else
    <div class="flex w-full items-center justify-center text-2xl text-red-600 uppercase 
    rounded-md py-3">
        <p><strong>No hay comentarios</strong></p>
    </div>
    @endif
    <div class="flex w-full flex-none justify-center ">
        <div class="flex flex-shrink-0 justify-center p-5 items-center">
            @if ($comentarios->hasPages())
                @if (!$comentarios->onFirstPage())
                <div class="flex-none">
                    <a href="{{ $comentarios->previousPageUrl() }}" class="px-2 py-3 text-flugreen-500
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
                    Página {{ "{$comentarios->currentPage()} de {$comentarios->lastPage()}" }}
                </div>
                @if ($comentarios->hasMorePages())
                <div class="flex-none">
                    <a href="{{ $comentarios->nextPageUrl() }}" class="px-2 py-3 text-flugreen-500
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
    @if (session('comment'))
        <script>Swal.fire("Exito","{{session('comment')}}","success");</script>
    @endif
    @if (session('compra'))
        <script>
            var invoiceId = "{{session('compra')}}";
            Swal.fire("Exito","Se realizo la compra sastifactorianete","success");

            window.open("{{url('invoice/'.session('compra'))}}");
        </script>
    @endif
    <script>
        $('#closeDescripcion').on('click',function(){
            $('#errorDescripcion').attr('hidden',true);
        });
    </script>
@endsection
