
    <header>
	<div class="secondshift"><img src="{{ asset('images/ACEMOBILESLOGO.png') }}" alt="Logo" width="295" height="43"></img></div>        
		<div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
<nav class="nav-bar">
    <ul>
        <li>
            <a href="Home" class="active"></i>Home</a>
        </li>
        <li>
            <a href="About">About</a>
        </li>
        <li>
            <a href="Contact">Contact</a>
        </li>
        <li>
                <a href="Products">Products</a>
        </li>
        <li>
            <a href="Login">Login</a>
        </li>
		 <li>
            <a href="Register">Register</a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-basket-shopping" style="color:white"></i></a>
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
