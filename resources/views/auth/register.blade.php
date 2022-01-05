<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f624072b07.js" crossorigin="anonymous"></script>

</head>

<body class="vh-100 bg-secondary d-flex justify-content-center">
    <div id="sign-up" class="w-50 bg-dark text-light p-5 align-self-center rounded-3">
        <h2 class="fw-bold"> Sign up to MiniSoc</h2>
        <form class="fw-bold" action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="name" class="text-warning mb-1">Name</label>
                <input type="text" name="name"
                    class="form-control bg-transparent text-light @error('name')
                    is-invalid @enderror"
                    id="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email" class="text-warning mb-1">Email</label>
                <input type="email" name="email"
                    class="form-control bg-transparent text-light @error('email')
                    is-invalid @enderror"
                    id="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password" class="text-warning mb-1">Password</label>
                <input type="password" name="password"
                    class="form-control bg-transparent text-light @error('password')
                    is-invalid @enderror"
                    id="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password2" class="text-warning mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control bg-transparent text-light"
                    id="password2">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning text-center fw-bold">Submit</button>
                <span class="text-center d-block mt-2 fw-normal">Already have account ?? <a
                        href="{{ route('login') }}" class="link-warning text-decoration-none">Login</a></span>
            </div>
        </form>
    </div>
</body>

</html>
