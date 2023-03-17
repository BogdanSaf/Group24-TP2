<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/products.css') }}">
  <title>Document</title>
</head>
<body>
  
<div class="wrapper">
  <div class="category-filter">
     <div class="container">
        <div class="title">
          <h1>Featured Products</h1>
        </div>
        <div class="filter-btns">
          <button type = "button" class="filter-btn" id="all">All</button>
          <button type = "button" class="filter-btn" id="Apple">APPLE</button>
          <button type = "button" class="filter-btn" id="Samsung">SAMSUNG</button>
          <button type = "button" class="filter-btn" id="Oppo">OPPO</button>
          <button type = "button" class="filter-btn" id="Sony">SONY</button>
          <button type = "button" class="filter-btn" id="Google">GOOGLE</button>
        </div>

        @foreach ($products as $product)
        <div class="filter-items">
          <div class="filter-item all Apple">
            <div class="item-img">
              <a href="products/preview/{{ $product['productID'] }}">
              <img src="{{ URL::asset('/images/' . $product->productImage) }}" width="250" height="300">
              <span class="discount">20%</span>
            </div>
            <div class="item-info">
              <p>Lorem ipsum dolor</p>
            </div>
            <div>
                <span class="old-price">£2000</span>
                <span class="new-price">£1000</span>
              </div>
              <div>
                <a href="#" class="add-btn">Add to cart</a>
              </div>
            </div>

          </div>  
        </div>
        @endforeach

      </div>    
   </div>
  </div>
</div>

<script src="script.js"></script>

</body>
</html>