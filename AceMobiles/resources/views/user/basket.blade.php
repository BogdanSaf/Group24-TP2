<!DOCTYPE html>

<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <title>Ace Mobiles | Basket</title> 
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('/css/BasketPage.css') }}">

</head>

<?php $totalPrice = 0;
  $decoded = json_decode(json_encode($basket), true);
?>

<body>

@include('shared.header')
  @include('shared.navbar')

<!--basket view-->

 <div class = "wrapper">
 <h1>Basket</h1> 
 <div class= "project">

    </div>
</div>

    <div class= "shop">

            @foreach($decoded as $item)
            <?php $totalPrice += $item['totalPrice'] * $item['quantity']; $imagePath = "/images/" .  $item['productImage']; ?>
            <div class = "box">
            <img src ="{{ URL::asset($imagePath)}}" alt="">
                 <div class="content">
             <h3>{{$item['productName']}} </h3>
             <h4>{{$item['productPrice']}}</h4>
             <p class="unit">Quantity:<input value="{{$item['quantity']}}"></p>
             <p class="btn-area">
                <i class = "fa fa-trash"></i>
                <span class ="btn2">Remove</span>
            </p>

        </div>
        
    </div>
    @endforeach

<div class="row">
        <div class="col-sm-4 alert alert-primary mx-3">
            <span>
                <strong>Total: £{{ $totalPrice }}</strong>
</span>
</div>
<div class="col-sm-4">
    <a href="{{ asset('/checkout') }}" class="btn btn-primary">Checkout</a>
</div>
</div>
</div>

<div style="height: 40px;" class="bg-white">

</div>


        
        <i class="fa fa-trash"></i>
                <span class ="btn2">Remove</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <--!<div class = "box">
            <img src ="" alt="">
                 <div class="content">
             <h3>iPhone 14 Pro Max </h3>
             <h4> Price: £££</h4>
             <p class="unit">Quantity: <input value=""></p>
             <p class="btn-area">
                <i class = "fa fa-trash"></i>
                <span class ="btn2">Remove</span>
            </p>

        </div>
    </div>




<div class="right-bar">
        <p><span>Subtotal</span> <span>£££</span></p>
        <hr>
        <p><span>Shipping</span> <span>££</span></p>
        <hr>
        <p><span>Total</span> <span>£££</span></p>
        
        <a href="#"><i class="fa fa-basket"></i>Checkout</a>

        </div>
    </div>
</div> -->

<!--insert footer below-->

@include('shared.footer')

</body>

</html>

