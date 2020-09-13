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
    <nav class="flex items-center justify-between flex-wrap bg-black bg-opacity-25 p-6 ">
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

              <div class="dropdown inline-block relative">
                <button class="text-flugreen-500  font-semibold py-3 px-4 rounded inline-flex 
                items-center hover:border-blue-600 hover:text-blue-600">
                  <span class="mr-1">Categorias</span>
                  <img src="{{asset('src/img/layouts/arrow.png')}}" width="20px" height="20px" alt="">
                </button>
                <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                  @foreach ($categories as $item)
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
                <form action="">
                  <button class="text-flugreen-500  font-semibold py-3 px-4 rounded inline-flex 
                  items-center hover:border-blue-600 hover:text-blue-600">
                          Ofertas
                  </button>
                </form>
              <div class="m-2"></div>

            
            <form class="flex w-2/3 flex-shrink-0" action="{{ route('search') }}" method="POST">
              @csrf
                <input type="text" class="bg-gray-800 appearance-none border-2 border-gray-500 
                rounded w-full py-2 px-2 text-flugreen-500  leading-tight 
                focus:outline-none focus:bg-gray-700 focus:border-gray-500
                @error('search') is-invalid @enderror" placeholder="Search......" name="search"
                value="{{ old('search') }}">
                <div class="m-2"></div>
                <button class="text-flugreen-500 py-3 px-4  
                rounded inline-flex items-center hover:border-blue-600 hover:text-blue-600" type="submit">
                Ofertas
              </button>
              @error('search')
                  <span class="text-red-800 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              
            </form>




          </div>
        </div>
        <div class="flex w-full block lg:flex lg:items-center lg:w-auto 
                    hidden">
              @auth
              <button id="car" class="flex items-center px-3 py-2 border border-black 
              rounded-full hover:border-flugreen-500 transform motion-reduce:transform-none 
              hover:-translate-y-1 hover:scale-110 transition ease-in-out duration-300" title="Crrito">
              <img src="{{asset('src/img/layouts/carrito.png')}}" width="25px" height="25px" alt="">
            </button>
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


    


    @yield('content-body')
</body>
    @section('scrippt')
    <script src="{{asset('src/js/jquery.min.js')}}"></script>
    <script src="{{asset('src/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/nav.js')}}"></script>
    @show
</html>



