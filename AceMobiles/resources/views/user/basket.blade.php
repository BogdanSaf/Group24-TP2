<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ace Mobiles | Basket</title> 
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('/css/BasketPage.css') }}">
</head>

<?php 
  $totalPrice = 0;
  $decoded = json_decode(json_encode($basket), true);
?>

<body>
  @include('shared.header')
  @include('shared.navbar')

  <div class="wrapper">

    @if (session('successRemove'))
    <div class="alert alert-success">
     <h5> {{ session('successRemove') }}</h5>
    </div>
    {{ session()->forget('successRemove') }}
  @endif

  
    @if (session('error'))
    <div class="alert alert-danger">
      <h5> {{ session('error') }}</h5>
    </div>
    {{ session()->forget('error') }}
  @endif

    <h1>Basket</h1> 

    <table>
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($decoded as $item)
          <?php 
            $totalPrice += $item['totalPrice'] * $item['quantity']; 
            $imagePath = "/images/" .  $item['productImage']; 
          ?>
          <tr>
            <td>
              <img src="{{ URL::asset($imagePath)}}" alt="{{ $item['productName'] }}" width="50">
              {{ $item['productName'] }}
            </td>
            <td>£{{ $item['productPrice'] }}</td>
            <td>
              <input type="number" value="{{ $item['quantity'] }}" min="1">
            </td>
            <td>£{{ $item['totalPrice'] }}</td>
            <td>
              <form action="{{ route('RemoveFromBasket') }} " method="post">
                @csrf
                <input type="hidden" name="productID" value="{{ $item['productID'] }}">
                <button class="remove-btn">Remove</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="summary">
      <p>
        Subtotal: <span>£{{ $totalPrice }}</span>
      </p>
      <a href="{{asset('/checkout')}}"><button class="checkout-btn">Checkout</button></a>
    </div>
  </div>

  @include('shared.footer')
</body>
</html>
