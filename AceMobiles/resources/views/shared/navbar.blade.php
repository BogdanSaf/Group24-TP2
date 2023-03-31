<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="NavBar.css">

    <title>Document</title>

</head>
<body>
    <header>
	<div class="secondshift"><img src="{{URL::asset('images/ACEMOBILESLOGO.png')}}" alt="Logo" width="295" height="43"></img></div>        
		<div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
<nav class="nav-bar">
    <ul>
        <li>
            <a href="/" class="active"></i>Home</a>
        </li>
        <li>
            <a href="/aboutus">About</a>
        </li>
        <li>
            <a href="/contactus">Contact</a>
        </li>
        <li>
                <a href="/products">Products</a>
        </li>
        @if (!Auth::check())
               <li><a href="/login">Login</a></li>
               <li><a href="/register">Register</a></li>
               @else
               <li><a href="/orders">My orders</a></li>
               <li><a href="/logout">Logout</a></li>
               <a href="/basket"><i class="fa-solid fa-basket-shopping" style="color:white"></i></a>
               @endif
        
    </ul>
</nav>
    </header>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function(){
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>

</body>
</html>