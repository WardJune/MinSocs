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
        <h2 class="fw-bold"> Log in to MiniSoc</h2>
        <form class="fw-bold" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="email" class="text-warning mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control bg-transparent text-light @error('email') is-invalid @enderror "
                    value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password" class="text-warning mb-1">Password</label>
                <input type="password" name="password"
                    class="form-control bg-transparent text-light @error('password') is-invalid @enderror"
                    id="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning text-center fw-bold">Log in</button>
                <span class="text-center d-block mt-3 fw-normal"><a href="{{ route('register') }}"
                        class="link-warning text-decoration-none">Create new account</a></span>
            </div>
        </form>
    </div>
</body>

</html>
