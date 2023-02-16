<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ }}">
</head>
<body>

    <div class="registerBigContainer">

        <div class="imageContainer">

        </div>

        <div class="loginFormContainer">

            {{-- Container for the h1 --}}
            <div class="h1Container">

            <h1>Sign UP</h1>

            </div>

            {{-- Container for the form --}}
            <form action="formRegister" method="post">
                @csrf

                {{-- Firs Name field --}}
                <label for="firstName">First Name: </label>
                <input type="text" name = "firstName" id = "firstNameID">

                {{-- Surname field --}}
                <label for="surname">Surname: </label>
                <input type="text" name = "surname" id = "surnameID">

                {{-- Phone Number field --}}
                <label for="phoneNumber">Phone Number: </label>
                <input type="tel" name = "phoneNumber" id = "phoneNumberID">

                {{-- Address field --}}
                <label for="address" > Address: </label>
                <input type="text" name="address" id="addressID">

                {{-- PostCode field --}}
                <label for="postCode">PostCode: </label>
                <input type="text" name="postCode" id="postCodeID">

                {{-- Email field --}}
                <label for="email">Email: </label>
                <input type="text" name="email" id="emailID">

                {{-- Password field --}}
                <label for="password">Password: </label>
                <input type="password" name="password" id="passwordID">

                {{-- Confirm Password field --}}
                <label for="confirmPassword">Confirm Password: </label>
                <input type="password" name="confirmPassword" id="confirmPasswordID">

                <input type="button" value="submit" name = "submitButton" id="SubmitButtonID">
            </form>

        </div>

    </div>
    
</body>
</html>