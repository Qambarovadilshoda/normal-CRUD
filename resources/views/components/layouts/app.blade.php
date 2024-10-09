<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <meta name="theme-color" content="#712cf9">
    <title>@yield('title' ?? 'Post CRUD')</title>

    <style>
        .bg-gray {
            background-color: gray;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 56px;
            /* Navbarning balandligi */
        }

        main {
            flex: 1;
            padding: 20px;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 56px;
                /* yoki kerakli qiymat */
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Profile</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        @method('DELETE')
                        <li class="nav-item">
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
                        </li>
                    </form>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registerForm')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loginForm')}}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="py-5 text-center text-body-secondary bg-gray">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p class="mb-0">
            <a href="#">Back to top</a>
        </p>
    </footer>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>