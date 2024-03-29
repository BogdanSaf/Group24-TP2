<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="UTF-8"/>
        <meta name ="viewport"
        content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
        <title>Ace Mobiles | Homepage</title> 
        @include('shared.header')
    </head>
<body>
@include('shared.navbar')
        <title> ACE MOBILES </title>
       
    </head>
<body>

 

<div class ="rowhomepage">
     <div class ="col-1homepage">
         <h2> ACE Mobiles</h2>
         <h3> Welcome to the launch of Ace Mobiles!</h3>
           
         <button onclick ="window.location.href = '/products'" >Shop Now<img src = "images/arrow.png" src="/products"></button>
     </div>
     <div class = "col-2homepage">
         <img src ="images/samsung.jpg" class="samsungmain">
                        
     </div> 
</div>

<div class="slider">
    <div class="myslide fade">
        <div class="txt">
            <h1>Ace Mobiles</h1>
            <p>Find the phone that is right for you!</p>
        </div>
        <img src="images/iphoneslideshow1.jpg" style="width: 100%; height: 100%;">
    </div>
    
    <div class="myslide fade">
        <div class="txt">
        </div>
        <img src="images/samsungslideshow2.png" style="width: 100%; height: 100%;">
    </div>
    
    <div class="myslide fade">
        <div class="txt">
        </div>
        <img src="images/opposlideshow3.png" style="width: 100%; height: 100%;">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
  <div class="dotsbox" style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
  </div>
</div>
            
 
<div class="cardshomepg">
    <div class="cardhomepage">
        <img src="images/appleblendedit.png" alt="" style="width:100%">
        <h1>Apple</h1>
         <button onclick ="window.location.href = '/products/Apple'" >Shop Now<img src = "images/arrow.png" src="/products"></button>
    </div>

    <div class="cardhomepage">
        <img src="images/googleblendedit.png" alt="" style="width:100%">
        <h1> Google</h1>
        <button onclick ="window.location.href = '/products/Google'" >Shop Now<img src = "images/arrow.png" src="/products"></button>
    </div>
    <div class="cardhomepage">
        <img src="images/samsungblendedit.png" alt="" style="width:100%">
        <h1> Samsung</h1>
        <button onclick ="window.location.href = '/products/Samsung'" >Shop Now<img src = "images/arrow.png" src="/products"></button>
    </div>
    <div class="cardhomepage">
        <img src="images/oppoblendedit.png" alt="" style="width:100%">
        <h1> Oppo</h1>
        <button onclick ="window.location.href = '/products/Oppo'" >Shop Now<img src = "images/arrow.png" src="/products"></button>
    </div>
    <div class="cardhomepage">
        <img src="images/sonyblend.edit.png" alt="" style="width:100%">
        <h1> Sony</h1>
        <button onclick ="window.location.href = '/products/Sony'" >Shop Now<img src = "images/arrow.png" src="/products"></button>
    </div>
</div>

<div class="review-section">
    <div class="reviewcards">
        <h2>Ace Mobiles are a great company to deal with and reasonably priced. Products came out very timely. Would definitely buy again. The item arrived well-packaged and in perfect condition, which is always a great sign of a company's commitment to customer satisfaction. </h2>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p> - Micheal smith</p>
    </div>
    <div class="reviewcards">
        <br>
        <h2>I recently purchased a product from Ace Mobiles, and I have to say that I was extremely impressed with the entire experience. The website was easy to navigate, and the checkout process was seamless and straightforward </h2>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <p> - Ajax Miyu</p>
    </div>
    <div class="reviewcards">
        <h2>I had an excellent experience with Ace Mobiles, and I would highly recommend them to anyone looking for high-quality and well-crafted products. The ordering process was simple and straightforward, and my phone arrived quickly and in perfect condition. </h2>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <p> - Bennet Munroe</p>
    </div>
</div>



@include('shared.footer')
</body>
</html>


<script>
const myslide = document.querySelectorAll('.myslide'),
	  dot = document.querySelectorAll('.dot');
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 8000);
function autoSlide() {
	counter += 1;
	slidefun(counter);
}
function plusSlides(n) {
	counter += n;
	slidefun(counter);
	resetTimer();
}
function currentSlide(n) {
	counter = n;
	slidefun(counter);
	resetTimer();
}
function resetTimer() {
	clearInterval(timer);
	timer = setInterval(autoSlide, 8000);
}

function slidefun(n) {
	
	let i;
	for(i = 0;i<myslide.length;i++){
		myslide[i].style.display = "none";
	}
	for(i = 0;i<dot.length;i++) {
		dot[i].className = dot[i].className.replace(' active', '');
	}
	if(n > myslide.length){
	   counter = 1;
	   }
	if(n < 1){
	   counter = myslide.length;
	   }
	myslide[counter - 1].style.display = "block";
	dot[counter - 1].className += " active";
}
</script> 

