<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HomePage</title>
    @include('shared.header')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
  </head>
  <body>
	<script src="index.js"></script>
  
  @include('shared.navbar')

<!--start of home page-->
<section class="home" id="home">
  <div class="home-text">
    <h1>WELCOME</h1>
    <h2>Slogan we <br>can use for website</h2>
    <a href="#" class="btn">View More</a>
  </div>

  <div class="home-img">
    <img src="../../../images/z flip 4 background.png" alt="Samsung">
  </div>
</section>

<!--start of home page-->
<!-- THE OUR PRODUCTS SECTION -->
<div class = "background">

<h1> PRODUCTS</h1>

  <div class = "Alignment">
    <div class = "cards">
        <img class="phones" src = "Iphone14(1).png">
        <h3> APPLE</h3>
        <!-- <button class = "Apple-buy"> BUY NOW</button> -->
        <button onclick  ="window.location.href = 'Apple.html'" >BUY NOW</button>
    </div>
    <div class = "cards">
        <img class="phones" src = "z flip 4 background.png">
        <h3> SAMSUNG </h3>  
        <!-- <button class = "Samsung-buy"> BUY NOW</button> -->
        <button onclick  ="window.location.href = 'Samsung.html'" >BUY NOW</button>
    </div>

    <div class = "cards">
        <img class="phones" src = "GooglePixel6a.png">
        <h3> GOOGLE </h3>  
        <!-- <button class = "Google-buy"> BUY NOW</button> -->
        <button onclick  ="window.location.href = 'Google.html'" >BUY NOW</button>
    </div>
    <div class = "cards">
        <img class="phones" src = "Oppo Reno 6 (1).png">
        <h3> OPPO</h3> 
        <!-- <button class = "Oppo-buy"> BUY NOW</button> -->
        <button onclick  ="window.location.href = 'Oppo.html'" >BUY NOW</button>
    </div>

    <div class = "cards">
        <img class="phones" src = "Sony.png">
        <h3> SONY </h3>  
        <!-- <button class = "Sony-buy"> BUY NOW</button> -->
        <button onclick  ="window.location.href = 'Sony.html'" >BUY NOW</button>
    </div>
  </div>
</div>





  </body>
</html>