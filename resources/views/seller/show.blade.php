@extends('layouts.seller')

@section('content-body')
<div class="flex flex-wrap w-auto h-auto bg-gray-800 opacity-24 border-2 border-gray-700
rounded-md">
    <div class="flex-initial w-full text-uppercase text-3xl text-center">
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
            <div class="flex flex-wrap w-1/3 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
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
            <div class="flex flex-wrap w-1/3 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
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
            <div class="flex flex-wrap w-1/3 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
                rounded-md text-xl h-40">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p><strong>Stop :</strong></p>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <p>{{$product->stop}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl h-20">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Creado :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>${{$product->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl h-20">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p><strong>Modificado :</strong></p>
                </div>
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <p>${{$product->updated_at}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap w-full bg-gray-800 opacity-24 border-2 border-gray-700 p-2
            rounded-md text-xl justify-center items-center">
            <div class="flex flex-wrap -mx-3 mb-6 ">
                
               
                <a title="Cancelar" class="bg-blue-800 border-2 border-gray-800 
                rounded-md py-3 px-3 hover:bg-opacity-25 hover:border-blue-700 uppercase" 
                type="submit" href="{{ route('index.seller')}}">
                    Cancelar
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap w-1/2 bg-gray-800 opacity-24 border-2 border-gray-700 p-5
    rounded-md text-2xl justify-center items-center " >
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="flex w-full md:w-full px-3 mb-6 md:mb-0 justify-center items-center">
                <img src="{{asset("storage/src/img/product-images/{$product->photo1}")}}" width="80%">
            
            </div>
        </div>
    </div>
    
</div>

<div class="flex w-full items-center justify-center pt-5">
    <div class="w-full pl-10 border-2 border-gray-700 
    rounded-md py-3">
    <span class="left-0 top-0 p-0">Comentario....</span>
    <span class="top-0 right-0 p-0">by....{{$comentarios->usuarios->email}}</span>
        <p><strong>{{$comentarios->comentario}}</strong></p>
    </div>
</div>
<div class="flex w-full items-center border-2 border-gray-700 rounded-md py-3">
    <form action="{{ route('new.answer') }}" method="POST" class="flex-1 items-center p-5">
        @csrf
        <input type="text" value="{{$product->id}}" name="product" readonly hidden>
        <input type="text" value="{{$comentarios->id}}" name="comment" readonly hidden>
        <div class="flex-1">
            <textarea name="descripcion" id="description" required
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
            <input type="submit" value="Responder" title="Responder" class="bg-black bg-opacity-25 
            px-2 py-2 rounded-md cursor-pointer text-white uppercase hover:text-black 
            hover:bg-gray-500"> 
    </form>
</div>
@endsection

@section('scrippt')
@parent
    @if (session('comment'))
        <script>Swal.fire("Exito","{{session('comment')}}","success");</script>
    @endif
    <script>
        $('#closeDescripcion').on('click',function(){
            $('#errorDescripcion').attr('hidden',true);
        });
    </script>
@endsection