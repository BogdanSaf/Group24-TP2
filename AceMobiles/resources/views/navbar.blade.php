<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body> -->
    <header>
        <div class="logo">AceMobiles</div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
<nav class="nav-bar">
    <ul>
        <li>
            <a href="" class="active">Home</a>
        </li>
        <li>
            <a href="">About</a>
        </li>
        <li>
            <a href="">Contact</a>
        </li>
        <li>
                <a href="">Products</a>
        </li>
        <li>
            <a href="">Login</a>
        </li>
        <li>
            <a href="">Basket</a>
        </li>
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

<!-- </body>
</html> -->