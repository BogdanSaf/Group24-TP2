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
            <h2 class="display-3">404!</h2>
            <p class="display-5">Looks like what you were trying to access something that doesnt exist!</p>
            <p class="display-5">Click here to <a href="/" class="display-5"> go to the home page</a></p>
        </div>
    </div>

    @include('shared.footer')
</body>
</html>