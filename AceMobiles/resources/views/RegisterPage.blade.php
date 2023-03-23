<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Page</title>
    
    <meta http-equiv="Content-Security-policy" content="updagreade-insecure-request">
    @include('shared.header')
    <link rel="stylesheet" href="{{ asset('/css/RegisterPage.css')}}">
    
</head><!DOCTYPE html>
<html lang="en">
<head>
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
    <div class="registerBigContainer">

        <div class="imageContainer">
            <img src="{{ asset('ACEMOBILES.jpg')}}" alt="ACEMOBILES LOGO">
        </div>

        <div class="registerFormContainer">

            {{-- Container for the h1 --}}
            <div class="h1Container">

            <h1>Sign UP</h1>

            </div>

            {{-- Container for the form --}}
            <form action="{{ route('RegisterUser')}}" method="POST" name= "formRegister">
                @csrf {{-- CSRF Token --}}

                {{-- Name field --}}
                <div class="nameContainer box">

                    {{-- Firs Name field --}}
                    <div class="firstNameContainer">
                        <label for="firstName">First Name: </label>
                        <input type="text" name = "firstName" id = "firstNameID">
                    </div>

                    {{-- Surname field --}}
                    <div class="surnameContainer">
                        <label for="surname">Surname: </label>
                        <input type="text" name = "surname" id = "surnameID">
                    </div>

                </div>

                {{-- Address field --}}
                <div class="addressContainer box">
                    <label for="address" > Address: </label>
                    <input type="text" name="address" id="addressID">
                </div>

                {{-- PostCode field --}}
                <div class="postCodeContainer box">
                    <label for="postcode">PostCode: </label>
                    <input type="text" name="postcode" id="postcodeID">
                </div>

                 {{-- Phone Number field --}}
                 <div class="phoneNumberContainer box">
                    <label for="phoneNumber">Phone Number: </label>
                    <input type="tel" name = "phoneNumber" id = "phoneNumberID">
                </div>

                {{-- Email field --}}
                <div class="emailContainer box">
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="emailID">
                </div>

                {{-- Password field --}}
                <div class="passwordContainer box">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="passwordID">
                </div>

                {{-- Confirm Password field --}}
                <div class="confirmPasswordContainer box">
                    <label for="confirmPassword">Confirm Password: </label>
                    <input type="password" name="confirmPassword" id="confirmPasswordID">
                </div>

                <div class="submitButtonContainer box">
                <button type="submit">Sign Up</button>
                </div>
            </form>

            <h3>Already got an account? Click <a href="{{ route("ReturnLoginPageView") }}">here</a> !</h3>

        </div>

    </div>
</div>

@include('shared.footer')
</body>
</html>