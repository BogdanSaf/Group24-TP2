<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('/css/RegisterPage.css')}}">
</head><!DOCTYPE html>
<html lang="en">
<head>
<body>
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
            <form action="formRegister" method="" name= "formRegister">
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

                {{-- Phone Number field --}}
                <div class="phoneNumberContainer box">
                    <label for="phoneNumber">Phone Number: </label>
                    <input type="tel" name = "phoneNumber" id = "phoneNumberID">
                </div>

                {{-- Address field --}}
                <div class="addressContainer box">
                    <label for="address" > Address: </label>
                    <input type="text" name="address" id="addressID">
                </div>

                {{-- PostCode field --}}
                <div class="postCodeContainer box">
                    <label for="postCode">PostCode: </label>
                    <input type="text" name="postCode" id="postCodeID">
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

        </div>

    </div>
</div>
</body>
</html>