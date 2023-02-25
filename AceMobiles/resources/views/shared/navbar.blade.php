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