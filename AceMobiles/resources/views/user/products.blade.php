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
  @include('shared.navbar')
  <div class="wrapper">
    <div class="category-filter">
      <div class="container">
        <div class="title">
          <h1>Products</h1>
        </div>
        <div class="filter-btns">
          <button type="button" class="filter-btn" id="all">All</button>
          <button type="button" class="filter-btn" id="Apple">APPLE</button>
          <button type="button" class="filter-btn" id="Samsung">SAMSUNG</button>
          <button type="button" class="filter-btn" id="Oppo">OPPO</button>
          <button type="button" class="filter-btn" id="Sony">SONY</button>
          <button type="button" class="filter-btn" id="Google">GOOGLE</button>
        </div>
      </div>
    </div>

    <div class="py-5 album">
      <div class="container">
        <div class="product-container">
          @foreach ($products as $product)
            <div class="product">
              <div class="filter-items">
                <div class="filter-item all Apple">
                  <div class="item-img">
                    <a href="products/preview/{{ $product['productID'] }}">
                      <img src="{{ URL::asset('/images/' . $product->productImage) }}" width="250" height="300">
                    </a>
                  </div>
                  <div class="item-info">
                    <p><b>{{ $product->productName }}</b></p>
                  </div>
                  <div>
                    <p class="text-md text-left text-muted">£{{ $product->productPrice }} </p>
                  </div>
                  <br>
                  <form action="{{ asset('addToBasket') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $product['id'] }}" name="id">
                    <button type="submit" class="btn btn-sm btn-outline-secondary mx-auto d-block">Add to basket</button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  
  <script src="script.js"></script>
  @include('shared.footer')
</body>
</html>





