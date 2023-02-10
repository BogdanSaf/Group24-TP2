<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>

    <div class="loginBigContainer">

        <div class="imageContainer">

        </div>

        <div class="loginFormContainer">
            <h1>Sign In</h1>
            <form action="formLogin" method="post">
                @csrf
                
                {{-- Email Field --}}
                <div class="email">
                    <input type="text" name="username" placeholder="Username">
                </div>

                {{-- Password Field --}}
                <div class="password">
                    <input type="password" name="password" placeholder="Password">
                </div>

                {{-- Submit Button --}}
                <div class="inputContainer">
                    <input type="submit" value="Sign In">
                </div>
            </form>
        </div>

    </div>
    
</body>
</html>