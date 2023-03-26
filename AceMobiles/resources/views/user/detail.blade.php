<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
   
    @include('shared.header')
    <title>Document</title>
</head>
<body>
@include('shared.navbar')
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ URL::asset('/images/' . $product->productImage) }}" width= "100%" id="ProductImg">
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
        <p>Home/ phone</p>
        <h1>{{ $product -> productName}}</h1>
        <h4>{{ $product -> productPrice }}</h4>
        <select>
            <option value="">Select colour</option>
            <option value="">Pink</option>
            <option value="">blue</option>
            <option value="">black</option>
        </select>
        <input type="number" value="1">
        <a href="" class="btn">Add to Cart</a>
        <h3>Product Details<i class= "fa fa-indent"></i></h3>
        <br>
        <p>{{ $product -> productDescription}}</p>
     </div>
    </div>
</div> 

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


</body>
</html>