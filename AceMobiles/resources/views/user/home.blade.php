<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Ace Mobiles | Homepage</title>
    @include('shared.header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    @include('shared.navbar')
  </head>
  <body>
	
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src= "../../../images/z flip 4 background.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>We are ace mobiles</h5>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id animi voluptate, saepe minus laboriosam magnam assumenda suscipit accusamus? </p>
      <p><a href="#" class= "btn btn-warning mt-3">Learn More</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src= "../../../images/z flip 4 background.png"class="d-block w-50" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id animi voluptate, saepe minus laboriosam magnam assumenda suscipit accusamus? </p>
      <p><a href="#" class= "btn btn-warning mt-3">Learn More</a>></a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src= "../../../images/z flip 4 background.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id animi voluptate, saepe minus laboriosam magnam assumenda suscipit accusamus? </p>
      <p><a href="#" class= "btn btn-warning mt-3">Learn More</a>></a></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  

 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
  @include('shared.footer')
</html>