<!DOCTYPE html>

<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=">
  <title>Ace Mobiles | Basket</title> 
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('/css/BasketPage.css') }}">

</head>

<body>

@include('shared.header')
  @include('shared.navbar')

 <div class = "wrapper">
 <h1>your basket</h1> 
 <div class= "project">
    <div class= "shop">
        <div class = "box">
            <img src ="" alt="">
                 <div class="content">
             <h3>iPhone 14 Pro Max </h3>
             <h4>Price: £££</h4>
             <p class="unit">Quantity: <input value=""></p>
             <p class="btn-area">
                <i class="fa fa-trash"></i>
                <span class ="btn2">Remove</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class = "box">
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


<div class = "box">
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
</div>

@include('shared.footer')

</body>

</html>

