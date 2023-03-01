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


  </body>
</html>