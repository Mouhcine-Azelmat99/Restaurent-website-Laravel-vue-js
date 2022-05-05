<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- fontawesome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- css file -->
    {{-- <link rel="stylesheet"href="{{ mix('/css/app.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title')</title>
  </head>
  <body style="overflow-x: visible">
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark text-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-warning text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Terrain ADMIN</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start text-white" id="menu">
                    <li class="nav-item my-3">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white align-middle px-0">
                            <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline">DASHBOARD</span>
                        </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="{{ route('menu.index') }}" class="nav-link text-white px-0 align-middle">
                            <i class="fa-solid fa-futbol"></i> <span class="ms-1 d-none d-sm-inline">Menu</span> </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="{{ route('categories.index') }}" class="nav-link text-white px-0 align-middle">
                            <i class="fas fa-bars"></i> <span class="ms-1 d-none d-sm-inline">Catgeories</span> </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="{{ route('admin.reservations') }}" class="nav-link text-white px-0 align-middle">
                            <i class="far fa-calendar-alt"></i> <span class="ms-1 d-none d-sm-inline">Reservations</span> </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="{{ route('admin.orders') }}" class="nav-link text-white px-0 align-middle">
                            <i class="far fa-calendar-alt"></i> <span class="ms-1 d-none d-sm-inline">Orders</span> </a>
                    </li>
                </ul>
            </ul>
            </div>
        </div>
        <div class="col py-3">
            <div class="content py-3">
                 @yield('content')
            </div>
        </div>
    </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
  </body>
</html>
