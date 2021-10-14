<!doctype html>
<html lang="es">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta name="author" content="Edinxshons">
    <title>@yield("titulo") - {{env("APP_NAME")}}</title>
    <link href="{{url('public/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <style>
        body {
            padding-top: 70px;
            /*Para la barra inferior fija*/
            padding-bottom: 70px;
        }
    </style>

    @yield("lib")

    @push('styles')
        @livewireStyles
    @endpush
    
    
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top navbar-text-white">
    <a class="navbar-brand" href="{{route("home")}}">{{env("APP_NAME")}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            id="botonMenu" aria-label="Mostrar u ocultar menú">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Registro
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route("home")}}">Inicio&nbsp;<i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("articulos.index")}}">Articulos<i class="fa fa-box"></i></a>
                </li><li class="nav-item">
                    <a class="nav-link" href="{{route("marcas.index")}}">Marcas<i class="fa fa-box"></i></a>
                </li>
                </li><li class="nav-item">
                    <a class="nav-link" href="{{route("modelos.index")}}">Modelos<i class="fa fa-box"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("productos.index")}}">Productos&nbsp;<i class="fa fa-box"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("vender.index")}}">Vender&nbsp;<i class="fa fa-cart-plus"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("ventas.index")}}">Ventas&nbsp;<i class="fa fa-list"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("usuarios.index")}}">Usuarios&nbsp;<i class="fa fa-users"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("clientes.index")}}">Clientes&nbsp;<i class="fa fa-users"></i></a>
                </li>
            @endguest
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <a href="{{route("logout")}}" class="nav-link">
                        Salir ({{ Auth::user()->name }})
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<script type="text/javascript">
    // Tomado de https://parzibyte.me/blog/2019/06/26/menu-responsivo-bootstrap-4-sin-dependencias/
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.querySelector("#menu"),
            botonMenu = document.querySelector("#botonMenu");
        if (menu) {
            botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
        }
    });
</script>
<main class="container-fluid">
    @yield("contenido")
</main>
<footer class="px-2 py-2 fixed-bottom bg-dark">
    <span class="text-white">Sistema de Inventario DCB
        <a class="text-white" href="#">Desarrollado por:</a>
        
        Edinxshons Rojas
        
    </span>
    <br>
    <span class="text-white">Info: 
        <b>Edinxshonsrojasuptos@gmail.com</b>
        
    </span>
</footer>

|   @yield('js')
    @push('scripts')
        @livewireScripts
    @endpush
    

</body>
</html>
