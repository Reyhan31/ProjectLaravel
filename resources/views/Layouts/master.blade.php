<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container-md">
        <nav class="navbar navbar-expand-lg navbar-light fs-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="{{URL::asset('assets/img/veggs.png')}}" class="rounded d-block img-fluid" width="30%" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/" style="color: #FFD700">Home</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/cart" style="color: #FFD700">Cart</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #FFD700">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if(auth()->user()->role >= 2)
                            <li><a class="dropdown-item" href="/userData">User Data</a></li>
                            <li><a class="dropdown-item" href="/addProduct">Add Product</a></li>
                            @endif
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/invoice">Invoice</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login" style="color: #FFD700">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/regis" style="color: #FFD700">Register</a>
                        </li>                        
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>


            <footer class="text-center text-lg-start fixed-bottom">
                <section class="social">
                    <div class="container text-center">
                        <ul class="d-flex justify-content-center">
                            <a href="#"><img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png"/></a>                                                      
                            <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                            <a href="#"><img src="https://img.icons8.com/color/48/000000/line-me.png"/></a>
                        </ul>
                    </div>
                </section>
                <div class="text-center p-3" style="background-color: #FFD700;">
                    © 2020 Copyright: Reyhan
                </div>
            </footer>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>