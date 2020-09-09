<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @section('style')
        <link rel="stylesheet" href="<script src="https://kit.fontawesome.com/392edbd6ae.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('src/css/tailwindcss.css')}}">
        <link rel="stylesheet" href="{{asset('src/css/modal.css')}}">
    @show
    
</head>
<body class="container mx-auto bg-gray-800">
    {{-- menu --}}
    <nav class="flex items-center justify-between flex-wrap bg-black p-6 ">
      <div class="block lg:hidden">
        <button id="navbtn" class="flex items-center px-3 py-2 border border-black 
          rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
          hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300">
          <img src="{{asset('src/img/layouts/barras.png')}}" width="15px" height="15px" alt="">
        </button>
      </div>
        <div class="flex items-center flex-shrink-0 mr-6 lg:justify-start 
            sm:text-center ">
            <img src="{{asset('src/img/layouts/logo.png')}}" width="50px" height="50px" alt="">
            <span class="font-semibold text-xl text-flugreen-500  tracking-tight">TegnologyJr</span>
        </div>
        <div id="options" class="flex w-full block lg:flex lg:items-center lg:w-auto 
              hidden">
          <div class="text-sm lg:flex-grow">
            <a class="hover:bg-flugreen-500 hover:text-black text-flugreen-500 font-bold 
                    py-2 px-4 rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
                href="{{ route('categories.index') }}">
                Categorias
            </a>
            <a class="hover:bg-flugreen-500 hover:text-black text-flugreen-500 font-bold 
                    py-2 px-4 rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
                    href="{{ route('sub-categories.index') }}">
                Sub Categorias
            </a>
            <button class="hover:bg-flugreen-500 hover:text-black text-flugreen-500 font-bold 
                    py-2 px-4 rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300">
                Facturas
            </button>
            <a class="hover:bg-flugreen-500 hover:text-black text-flugreen-500 font-bold 
                    py-2 px-4 rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
                    href="{{ route('offer.index')}}">
                Ofertas
            </a>
            <a class="hover:bg-flugreen-500 hover:text-black text-flugreen-500 font-bold 
                    py-2 px-4 rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
                    href="{{ route('product.index') }}">
                productos
            </a>
            <a class="hover:bg-flugreen-500 hover:text-black text-flugreen-500 font-bold 
                    py-2 px-4 rounded transform motion-reduce:transform-none 
                    hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
                href="{{ url('users') }}">
                Usuarios
            </a>
            <div class="pl-5 inline-block items-center">
              <button id="car" class="px-3 py-2 border border-black
                rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
                hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300">
                <img src="{{asset('src/img/layouts/carrito.png')}}" width="25px" height="25px" alt="">
              </button>

              <div class="dropdown relative inline-block">
                <button class="text-flugreen-500  font-semibold py-2 px-4 
                      rounded inline-flex items-center">
                      <img src="{{asset('src/img/layouts/usu.png')}}" width="18px" height="18px" alt="">
                </button>
                <ul class="dropdown-menu align-middle fixed right-0 mt-0 hidden text-gray-700 pr-4">
                  <li class="">
                    <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block 
                    whitespace-no-wrap" href="#">Configuraciones</a></li>
                  <li class="">
                    <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block 
                    whitespace-no-wrap" href="#">Two</a></li>
                    <li>

                      <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block 
                      whitespace-no-wrap" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Cerrar sesion') }}
                      </a>
  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                      class="d-none">
                          @csrf
                      </form>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </nav>

<!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content flex flex-wrap w-1/2  h-auto flex-col">
        <div class="flex justify-end p-2">  
          <button class="close bg-red-700 hover:bg-red-400 text-white font-bold py-2 px-4  
          rounded-full transform motion-reduce:transform-none hover:-translate-y-1 
          hover:scale-110 transition ease-in-out duration-300">X</button>
        </div>
        <div class="flex justify-center items-center">
          <form class="w-full max-w-sm pb-10 pl-5 pr-5">
            <br>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-flugreen-500  font-bold md:text-left
                   mb-1 md:mb-0 pr-2" for="inline-full-name">
                  E-mail :
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-800 appearance-none border-2 border-black 
                rounded w-full py-2 px-4 text-flugreen-500  leading-tight 
                focus:outline-none focus:bg-gray-700 focus:border-gray-500" 
                id="inline-full-name" type="text">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-flugreen-500  font-bold md:text-left mb-1 md:mb-0 pr-2" for="inline-password">
                  Password :
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-800 appearance-none border-2 border-black 
                rounded w-full py-2 px-4 text-flugreen-500  leading-tight 
                focus:outline-none focus:bg-gray-700 focus:border-gray-500" id="inline-password" type="password" placeholder="******************">
              </div>
            </div>
            <div class="md:flex md:items-center">
              <div class="md:w-1/3"></div>
              <div class="md:w-2/3">
                <button class="shadow bg-black hover:bg-gray-700 
                               focus:shadow-outline focus:outline-none 
                               text-flugreen-500  font-bold py-4 px-6 rounded 
                               transform motion-reduce:transform-none 
                               hover:-translate-y-1 hover:scale-110 transition
                                ease-in-out duration-300" type="button">
                  Login
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div> 

    


    @yield('content-body')
</body>
    @section('scrippt')
      <script src="{{asset('src/js/jquery.min.js')}}"></script>
      <script src="{{asset('src/js/sweetalert2.all.min.js')}}"></script>
      <script src="{{asset('js/nav.js')}}"></script>
    @show
</html>



