
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
            <a href="/" ></i>Home</a>
        </li>
        <li>
            <a href="/aboutus">About</a>
        </li>
        <li>
            <a href="/contactus">Contact</a>
        </li>
        <li>
                <a href="Products">Products</a>
        </li>
        @if (!Auth::check())
        <li>
            <a href="/login" class="active">Login</a>
        </li>
		 <li>
            <a href="/register">Register</a>
        </li>
        @else
        <li>
            <a href="/logout">Logout</a>
        </li>    
        @endif
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
