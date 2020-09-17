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
    <nav class="flex items-center justify-between flex-wrap bg-black bg-opacity-25 p-6">
      <div class="block lg:hidden">
        <button id="navbtn" class="flex items-center px-3 py-2 border border-black 
          rounded-full hover:border-flugreen-500 ">
          <img src="{{asset('src/img/layouts/barras.png')}}" width="15px" height="15px" alt="">
        </button>
      </div>
      <a href="{{ route('index') }}">
        <div class="flex items-center flex-shrink-0 mr-6 lg:justify-start 
            sm:text-center ">
              <img src="{{asset('src/img/layouts/logo.png')}}" width="50px" height="50px" alt="">
              <span class="font-semibold text-xl text-flugreen-500  tracking-tight">TegnologyJr</span>
            </div>
          </a>
            
        <div class="flex items-center flex-shrink-0 text-right lg:hidden">
          <button id="car" class="flex items-center px-3 py-2 border border-black 
            rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
            hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300">
            <img src="{{asset('src/img/layouts/carrito.png')}}" width="25px" height="25px" alt="">
          </button>
          <div class="m-2"></div>
          <a id="myBtn2" class="flex items-center px-3 py-2 border border-black 
            rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
            hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
            href="{{ route('login') }}" title="Iniciar Sesion">
            <img src="{{asset('src/img/layouts/usu.png')}}" width="25px" height="25px" alt="">
          </a>
      </div>
        
        <div id="options" class="flex w-full block lg:flex lg:items-center lg:w-auto 
              hidden">
          <div class="flex text-sm lg:flex-grow sm:flex-col lg:flex-row">
            <form action="">
              <a class="text-flugreen-500  font-semibold py-3 px-4 rounded inline-flex 
              items-center hover:border-blue-600 hover:text-blue-600" href="{{ route('index') }}">
                      Home
              </a>
            </form>
          <div class="m-2"></div>
              <div class="dropdown inline-block relative z-40">
                <button class="text-flugreen-500  font-semibold py-3 px-4 rounded inline-flex 
                items-center hover:border-blue-600 hover:text-blue-600">
                  <span class="mr-1">Categorias</span>
                  <img src="{{asset('src/img/layouts/arrow.png')}}" width="20px" height="20px" alt="">
                </button>
                <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 ">
                  @foreach ($categoriesHome as $item)
                  @if ($loop->first)
                  <li class="">
                    <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" 
                    href="#">{{$item->name}}</a>
                  </li>
                  @endif
                  @if (!$loop->first && !$loop->last)
                  <li class="">
                    <a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" 
                    href="#">{{$item->name}}</a>
                  </li>
                  @endif
                  @if ($loop->last)
                      
                  <li class="">
                    <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                     href="#">{{$item->name}}</a>
                  </li>
                  @endif
                  @endforeach
                </ul>
              </div>
              <div class="m-2"></div>
            
              {{-- <div class="dropdown inline-block relative"> --}}
                

            
            <form class="flex w-2/3 flex-shrink-0" action="{{ route('search') }}" method="GET">
                <input type="text" class="bg-gray-800 appearance-none border-2 border-gray-500 
                rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                focus:outline-none focus:bg-gray-700 focus:border-gray-500
                @error('search') is-invalid @enderror" placeholder="Search......" name="search"
                value="{{ old('search') }}">
                <div class="m-2"></div>
                <button class="text-flugreen-500 py-3 px-4  
                rounded inline-flex items-center hover:border-blue-600 hover:text-blue-600" type="submit">
                Buscar
              </button>
              @error('search')
                  <span class="text-red-800 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              
            </form>




          </div>
        </div>
        <div class="flex w-full block lg:flex lg:items-center lg:w-auto hidden z-40">
              @auth
              @if ($carritoCount > 0)
                  <button id="car" class="modal-open flex items-center px-3 py-2 border border-black 
                      rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
                      hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300" title="Crrito">
                      <img src="{{asset('src/img/layouts/carrito.png')}}" width="25px" height="25px" alt="">
                      <span class="flex justify-center text-center">
                        <span class="relative inline-flex rounded-md px-1 bg-white 
                        text-center text-red-600"><strong>{{$carritoCount}}</strong></span>
                    </span> 
                  </button>
              @else
                  <button id="car" class="modal-open flex items-center px-3 py-2 border border-black 
                      rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
                      hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300" title="Crrito">
                      <img src="{{asset('src/img/layouts/carrito.png')}}" width="25px" 
                      height="25px">
                      <div class="m-1"></div>
                      <span class="flex justify-center text-center">
                          <span class="relative inline-flex rounded-md px-1 bg-white 
                          text-center text-red-600"><strong>0</strong></span>
                      </span> 
                  </button>
              @endif
            <div class="m-2"></div>
              <div class="pl-5 inline-block items-center">
                <div class="dropdown relative inline-block">
                  <button class="text-flugreen-500  font-semibold py-2 px-4 
                        rounded-md inline-flex items-center">
                        <img src="{{asset("storage/src/img/user-images/".Auth()->user()->photo)}}"
                         width="30px" height="30px">
                  </button>
                  <ul class="dropdown-menu align-middle fixed right-0 mt-0 hidden text-gray-700 pr-4">
                    <li class="">
                      <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block 
                           whitespace-no-wrap" href="{{ route('edit.perfil') }}">{{Auth()->user()->name}}</a>
                    </li>
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
              @else
                <a class="flex items-center px-3 py-2 border border-black rounded-full 
                hover:border-flugreen-500 transform motion-reduce:transform-none 
                  hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300"
                  href="{{ route('login') }}" title="Iniciar Sesion">
                  <img src="{{asset('src/img/layouts/usu.png')}}" width="25px" height="25px" alt="">
                </a>
              @endauth
        </div>
      </nav>
      {{-- <button class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open Modal</button> --}}
      <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
          
          <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
            <span class="text-sm">(Esc)</span>
          </div>
    
          <!-- Add margin if you want to see some of the overlay behind the modal-->
          <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">Productos seleccionados!</p>
              <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
              </div>
            </div>
            <!--Body-->
            @if (count(Cart::getContent()))
            <table class="w-full">
              <thead>
                <tr>
                  <th>Nombe</th>
                  <th>precio</th>
                  <th>accion</th>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::getContent() as $item)
                <tr>
                  <td>
                    {{$item->name}}
                  </td>
                  <td>
                    {{$item->price}}
                  </td>
                  <td class="flex items-center justify-center ">
                    <a class="bg-red-600 px-2 py-2 rounded-lg hover:bg-opacity-25
                      cursor-pointer" href="{{ route('remove.cartProduct', $item->id) }}">
                      <img src="{{asset("src/img/forms/drop.png")}}" width="20px"
                      height="20px">
                    </a>
                  </td>
                </tr>
                @endforeach
                <tr class="border-t-2 border-black">
                  <td colspan="2">Total</td>
                  <td>${{number_format(Cart::getSubtotal(),2)}}</td>
                </tr>
                <tr>
                  <br>
                  <td colspan="3">
                    <a href="{{ route('removeAll.cartProduct') }}" class="uppercase">
                      <div class="flex bg-teal-500 w-full rounded-lg items-center justify-center cursor-pointer
                        py-3 px-3 hover:bg-opacity-25 hover:text-red-600">
                        <strong>Remover todo!</strong>
                      </div>
                    </a>
                  </td>
                </tr>
              </tbody>
              
            </table>
            @else
                <span>No hay productos agregados....</span>
            @endif
            <div class="m-3"></div>
            <!--Footer-->
            <div class="flex justify-end pt-2">
              <a class="px-4 bg-green-500 p-3 rounded-lg text-white hover:bg-green-800 
              hover:text-white mr-2 uppercase" href="{{ route('procesar.cart') }}">pagar</a>

              <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white 
              hover:bg-indigo-400 uppercase">Close</button>
            </div>
            
          </div>
        </div>
      </div>
    

    @yield('content-body')
</body>
<div class="w-full m-2"></div>
  <footer class='w-full h-16 bg-black bg-opacity-25 text-center sticky p-5 inset-x-0 bottom-0 
    text-flugreen-500 ippercase text-md'>
    <strong>{{ date('Y') }} - Derechos reservados</strong>
  </footer>
    @section('scrippt')
    <script src="{{asset('src/js/jquery.min.js')}}"></script>
    <script src="{{asset('src/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('src/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/nav.js')}}"></script>
    <script src="{{asset('js/modal.js')}}"></script>
    @show
</html>



