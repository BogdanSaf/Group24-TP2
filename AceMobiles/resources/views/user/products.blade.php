<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/products.css') }}">
  <title>Products</title>
</head>
<body>

  <div class="category-filter">
    <div class="container">
      <div class="title">
        <h1>Products</h1>
      </div>
      <div class="filter-btns">
        <a href="{{ route('ReturnHomeView')}}"><button type="button" class="filter-btn active" id="all">ALL</button></a>
        <a href="{{ route('ReturnAppleProducts')}}"><button type="button" class="filter-btn" id="Apple">APPLE</button></a>
        <a href="{{ route('ReturnSamsungProducts')}}"><button type="button" class="filter-btn" id="Apple">SAMSUNG</button></a>
        <a href="{{ route('ReturnOppoProducts')}}"><button type="button" class="filter-btn" id="Apple">OPPO</button></a>
        <a href="{{ route('ReturnSonyProducts')}}"><button type="button" class="filter-btn" id="Apple">SONY</button></a>
        <a href="{{ route('ReturnGoogleProducts')}}"><button type="button" class="filter-btn" id="Apple">GOOGLE</button></a>
      </div>
    </div>
  </div>

  <div class="search-bar">
    <form action="{{ route('products.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
  </div>
  
  <div class="product-grid">
    <div class="container">
      <div class="filter-items">
        @foreach ($products as $product)
          <div class="filter-item all {{ $product->productBrand }}">
            <div class="item-img">
              <a href="products/preview/{{ $product['productID'] }}">
                <img src="{{ URL::asset('/images/' . $product->productImage) }}" alt="{{ $product->productName }}" width="250" height="300">
              </a>
            </div>
            <div class="item-info">
              <p><b>{{ $product->productName }}</b></p>
            </div>
            <div class="item-price">
              <p class="text-md text-left text-muted">£{{ $product->productPrice }}</p>
            </div>
            <div class="item-action">
              <form action="{{ asset('addToBasket') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $product['id'] }}" name="id">
                <button type="submit" class="add-to-basket-btn">Add to basket</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
