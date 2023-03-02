<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page not found</title>
    @include('shared.header')
    <link rel="stylesheet" href="{{ asset('css/ErrorPage.css') }}">
</head>
<body>

    @include('shared.navbar')

    <div class="ErrorContainer justify-content-center ">
        <div class="alert alert-danger text-center">
            <h2 class="display-3">404</h2>
            <p class="display-5">Looks like what you were trying to access couldn't be found!</p>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>