<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login Page</title>
    @include('shared.header')
    <link rel="stylesheet" href="{{ asset('css/LoginPage.css') }}">
    
</head>
<body>
    
    @include('shared.navbar')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h4>{{ $error }}</h4>
            @endforeach
        </div>
    @endif

    

    <div class="setEvrythingInTheMiddle">

        <div class="loginBigContainer">

            <div class="imageContainer">
                <img src="{{ asset('ACEMOBILES.jpg')}}" alt="ACEMOBILES LOGO">
            </div>

            <div class="loginFormContainer">
                
                    <h1>Sign In</h1>


                    <h2>Welcome to AceMobiles!</h2>


                    <form action="{{ route('LoginUser')}}" method="POST" name="formLogin">
                        @csrf
                        
                        {{-- Email Field --}}
                        <div class="emailContainer box">
                            <label for="email">Email: </label>
                            <input type="text" name="email" placeholder="Email">
                        </div>

                        {{-- Password Field --}}
                        <div class="passwordContainer box">
                            <label for="password">Password: </label>
                            <input type="password" name="password" placeholder="Password">
                        </div>

                        {{-- Submit Button --}}
                        <div class="submitButtonContainer box">
                            <button type="submit">Sign In</button>
                        </div>
                    </form>

                    <h3>Not registered? Click <a href="{{ route("ReturnRegisterPageView") }}">here</a> !</h3>
                
            </div>

        </div>
    </div>
    
</body>

@include('shared.footer')
</html>