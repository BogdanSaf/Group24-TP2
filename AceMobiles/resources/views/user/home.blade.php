<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="UTF-8"/>
        <meta name ="viewport"
        content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
        <title>Ace Mobiles | Homepage</title> 
        @include('shared.header')
    </head>
<body>
@include('shared.navbar')
<div id ="main">
    <div id = "box1"></div>

    <div id="box2">
        <h1>Ace </br>Mobiles</h1>
    
        <button class = "header-shop"  onclick="window.location.href = 'ProductsPage.html'">Shop Now<img src="images/arrow.png"></button>
    </div>

    </div>

</div>
<div class = "best-sellers">
    <h2>Categories</h2>

    <div class="cards">
        <div class="card">
            <img src="images/samsunggalaxys22plus(128gb).jpg" style="width:100%">
            <h1> Samsung</h1>
            <br>
            <button id = "btn">Shop now</button>
        </div>

        <div class="card">
            <img src="images/iPhone14ProMax(128GB).jpg"  style="width:50%">
            <h1>Apple</h1>
            <br>
            <button id = "btn">Shop now</button>
        </div>
        <div class="card">
            <img src="images/sonyxperia1IV(256GB).jpg"  style="width:100%">
            <h1> Sony</h1>
            <br>
            <button id = "btn">Shop now</button>
        </div>
        <div class="card">
            <img src="images/oppofindx3pro(256gb).jpg"  style="width:65%">
            <h1> Oppo</h1>
            <br>
            <button id = "btn">Shop now</button>
        </div>
        <div class="card">
            <img src="images/googlepixel7(128gb).jpg"  style="width:50%">
            <h1> Google</h1>
            <br>
            <button id = "btn">Shop now</button>
        </div>
    </div>
</div>


<section id ="review-section">
    <div class = "container">
        <div class="subcontainer">
            <div class="review-wrapper">
                <div class="header">
                    <h1>Our Reviews</h1>
                </div>
                <div class="slider-wrapper">
                    <div class="slider">
                        <div class="slide">
                            <br>
                            <h2>Ace Mobiles are a great company to deal with and reasonably priced. Products came out very timely. Would definitely buy again. The item arrived well-packaged and in perfect condition, which is always a great sign of a company's commitment to customer satisfaction. </h2>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <p> - Micheal smith</p>
                        </div>
                        <div class="slide">
                            <h2>I recently purchased a product from Ace Mobiles, and I have to say that I was extremely impressed with the entire experience. The website was easy to navigate, and the checkout process was seamless and straightforward</h2>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <br>
                            <p> - Ajax Miyu</p>
                        </div>                        
                        <div class="slide">
                            <br>
                            <h2>I had an excellent experience with Ace Mobiles, and I would highly recommend them to anyone looking for high-quality and well-crafted products.</h2>
                            <br>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <p> - Bennet Monroe</p>
                        </div>
                    </div>
                </div>

                <div id="controls">
                    <button class ="previous"><i class="fa-solid fa-angle-left"></i></button>
                    <button class = "next"><i class="fa-solid fa-angle-right"></i></button>
                </div>

            </div>
        </div>
        
    </div>
    
</section>

<script src="{{ asset('js/homescript.js') }}"></script>

</body>
@include('shared.footer')
</html>

