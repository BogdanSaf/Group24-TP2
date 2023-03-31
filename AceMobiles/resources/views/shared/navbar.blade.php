<nav>
         <ul>
            <li class="logo"><img src="{{ asset('images/ACEMOBILESLOGO.png') }}" alt="Logo" width="295" height="43"></img></li>
            <li class="btn"><span class="fas fa-bars"></span></li>
            <div class="items">
               <li><a href="/">Home</a></li>
               <li><a href="/aboutus">About</a></li>
               <li><a href="/products">Products</a></li>
               <li><a href="/contactus">Contact</a></li>
               @if (!Auth::check())
               <li><a href="/login">Login</a></li>
               <li><a href="/register">Register</a></li>
               @else
               <li><a href="/orders">My orders</a></li>
               <li><a href="/logout">Logout</a></li>
               @endif
    
            </div>
            <!-- <li class="search-icon">
                    <form action="{{ route('products.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search...">
                    <label class="icon" type="submit">
                    <span class="fas fa-search"></span>
                    </form>
               </label>
            </li> -->
            <div class="basket">
                <a href="/basket"><i class="fa-solid fa-basket-shopping" style="color:white"></i></a>
            </div>
         </ul>
      </nav>
