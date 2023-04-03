<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
   
    @include('shared.header')
    <title>Ace Mobiles | Products</title> 
</head>
<body>
@include('shared.navbar')

@if ($errors->any())
<div class="alert alert-danger border-0 m-auto">
    @foreach ($errors->all() as $error)
        <h5>{{ $error }}</h5>
    @endforeach
</div>
@endif

@if (session('success'))
<div class="alert alert-success border-0 m-auto">
    <h5>{{ session('success') }}</h5>
    {{ session()->forget('success') }}
</div>
@endif




    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
            <img src="{{ asset('images/' . $product->productImage) }}" alt="{{ $product->productName }}" width="250" height="300">
       <div class="small-img-row">
        <div class="small-img-col">
            <img src="images/google-pixel-6-pro-front-gallery-1-141021.jpg" width= "100%" class="small-img"alt="">
        </div>
        <div class="small-img-col">
            <img src="images/google-pixel-6-pro-gallery-3-141021.jpg" width= "100%" class="small-img"alt="">
        </div>
        <div class="small-img-col">
            <img src="images/google-pixel-6-pro-front-gallery-1-141021.jpg" width= "100%" class="small-img"alt="">
        </div>
        <div class="small-img-col">
            <img src="images/google-pixel-6-pro-gallery-3-141021.jpg" width= "100%" class="small-img"alt="">
        </div>
       </div>
     </div>
     <div class="col-2">
      <!--  <p>Home/ phone</p> -->
        <h1>{{ $product -> productName}}</h1>
        <?php
      
      if ($product->productStock <= 0)
      {
          echo '<h4 style="color:red;">Out Of Stock</h4>';
      }
      else 
      {
          echo '<h4 style="color:blue;">In Stock</h4>';
      }
      ?>
        <h4>£{{ $product -> productPrice }}</h4>
        <select>
            <option value="">Select colour</option>
            <option value="">Pink</option>
            <option value="">blue</option>
            <option value="">black</option>
        </select>
       <br>
       


        @if ($product->productStock > 0)
        Quantity: <input type="number" value="1" id="quantityInput" min="1"></input>
        @endif
        <br></br>
        @if ($product->productStock > 0)
    <div class="item-action" id="buyDiv">
        <form action="{{ route('AddToBasket') }}" method="post">
            @csrf
            <input type="hidden" value="1" id="quantity" name="quantity">
            <input type="hidden" value="{{ $product['productID'] }}" name="id">
            <button type="submit" class="add-to-basket-btn" id="buyButton">Add to basket</button>
        </form>
    </div>
@endif

<script>
    const quantityInput = document.getElementById('quantityInput');
    const quantity = document.getElementById('quantity');
    quantity.value = quantityInput.value;
    const buyDiv = document.getElementById('buyDiv');
   
  
    quantityInput.addEventListener('change', (event) => {
        quantity.value = event.target.value;

        if (quantityInput.value <= 0 ) {
            buyDiv.style.display = 'none';
        }else {
            buyDiv.style.display = 'block';
        }
        
    });
  </script>




         <h3>Product Details<i class= "fa fa-indent"></i></h3>
        <br>
        <p>{{ $product -> productDescription}}</p>
     </div>
    </div>
</div> 

<!--
<script>
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg = document.getElementbyClassName("small-img");

    SmallImg[0].onclick = function()
{
    ProductImg.src = SmallImg[0].src;
}
SmallImg[1].onclick = function()
{
    ProductImg.src = SmallImg[1].src;
}
SmallImg[2].onclick = function()
{
    ProductImg.src = SmallImg[2].src;
}
SmallImg[3].onclick = function()
{
    ProductImg.src = SmallImg[3].src;
}
</script>
-->

</body>
@include('shared.footer')
</html>