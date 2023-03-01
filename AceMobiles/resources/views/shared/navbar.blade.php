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
            <a href="/" class="active">Home</a>
        </li>
        <li>
            <a href="/about">About</a>
        </li>
        <li>
            <a href="/contactus">Contact</a>
        </li>
        <li>
                <a href="/products">Products</a>
        </li>
        <li>
            <a href="/login">Login</a>
        </li>
        <li>
            <a href="/register">Register</a>
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