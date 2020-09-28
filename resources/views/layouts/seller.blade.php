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
                <span class="text-3xl uppercase text-gray-700">
                    <strong>administración de vendedor</strong>
                </span>
            <div class="pl-5 inline-block items-center">
              <div class="dropdown relative inline-block">
                <button class="text-flugreen-500  font-semibold py-2 px-4 
                      rounded-md inline-flex items-center ">
                      <img src="{{asset("storage/src/img/user-images/".Auth()->user()->photo)}}"
                       width="30px" height="30px" alt="">
                </button>
                <ul class="dropdown-menu align-middle fixed right-0 mt-0 hidden text-gray-700 pr-4">
                  <li class="">
                    <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block 
                         whitespace-no-wrap" href="{{ route('edit.seller.perfil') }}">{{Auth()->user()->name}}</a>
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
          </div>
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



