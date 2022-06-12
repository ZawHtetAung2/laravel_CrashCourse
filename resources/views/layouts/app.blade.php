<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>Blog</title>
    </head>
    <body style="background-color: #cccccc;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light flex justify-content-between mb-5">
            <ul class="navbar-nav h5 ms-3">
                <li class="nav-item">
                    <a class="nav-link active me-3" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active me-3" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('posts')}}">Post</a>
                </li>   
            </ul>

            <ul class="navbar-nav h5 me-3">

                @auth
                <li class="nav-item">
                    <a class="nav-link active me-3" href="">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary  me-3">Logout</button>
                    </form>
                </li>
                @endauth

                @guest

                <li class="nav-item">
                    <a class="nav-link active" href="{{route('login')}}">Login</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('register')}}">Register</a>
                </li>  
                @endguest                
                 
            </ul> 
        </nav>
        @yield ('content')
    </body>
</html>