<!DOCTYPE html>


<head>
<meta charset="UTF-8"/>
<title>Ace Mobiles About</title>
@include('shared.header')
    <link href="AceAbout.css" rel="stylesheet" type="text/css" media="all">


</head>


<body>
@include('shared.navbar')
<center>

<h1>Ace Mobiles - About Us</h1>
<h2>History </h2>
<p>Since 2005, we have been helping to give customers a wide range of high quality mobile products.<br>
Our company started as a humble little shop in Birmingham offering phone repairs to passers-by.</br>
Since then, our company has expanded to over 200 stores across the UK as well as the website you are in right now!</p>


<h2>Values</h2>
<p>We ensure that our customer service is the core of everything that we do by finding you the best deals and products that are just right for you.</br>
We analyze a huge scope of handsets and network tariffs to ensure that customers get the best, personalised deals.</p>


<div class="home_img">
	<div class= "home_img__text_section_container">
		<img src="phonepeople.jpg" class="home_img__image">
		<div class="home_img__text_section_container">
		<span class="home_img__text_1">Quality deals for everyone!</span>
				<span class="home_img__text_2">Our policies ensure that our customers get the best, personalised PRIME deals!</span>
		</div>
		</div>
		</div>
</figure>



</center>

 <center>
 
 <h2>Awards</h2>
 <h3>Thanks to your support, we have won many awards!</h3>
 
 <div class="row">
	<div class="column">
		<img src="retailer.png" alt="test1" style="width:50%">
	</div>
<div class="row">
	<div class="column">
		<img src="MIA.png" alt="test1" style="width:50%">
	</div>
<div class="row">
	<div class="column">
		<img src="choice.png" alt="test1" style="width:50%">
	</div>	
</div>
 </center>

<section>
  <h2 class="title">FAQS</h2>
  <div class="container2">
  <div class="faq">
	<div class="question">
		<h3>How can I contact tech support?</h3>
		<svg width="15" height="10" viewbox="0 0 42 5">
		<path
		d="M3 3L21 21L39 3"
		stroke="white"
		stroke-width="7"
		stroke-linecap="round"
		/> 
		</svg>
		
		
	</div>
	<div class="answer">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	
	
	
	</div>
	</div>
	<hr>
	<div class="faq">
	
	
	
	<div class="question">
		<h3>What is Ace Mobiles?</h3>
		<svg width="15" height="10" viewbox="0 0 42 5">
		<path
		d="M3 3L21 21L39 3"
		stroke="white"
		stroke-width="7"
		stroke-linecap="round"
		/> 
		</svg>
		
		
	</div>
	<div class="answer">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	
	
	
	</div>
	</div>
	<hr>
		<div class="faq">
	
	
	
	<div class="question">
		<h3>What is the process behind refunds?</h3>
		<svg width="15" height="10" viewbox="0 0 42 5">
		<path
		d="M3 3L21 21L39 3"
		stroke="white"
		stroke-width="7"
		stroke-linecap="round"
		/> 
		</svg>
		
		
	</div>
	<div class="answer">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	
	
	
	</div>
	</div>
	
	
	<hr>
	<div class="faq">
	
	
	
	<div class="question">
		<h3>Where are you based?</h3>
		<svg width="15" height="10" viewbox="0 0 42 5">
		<path
		d="M3 3L21 21L39 3"
		stroke="white"
		stroke-width="7"
		stroke-linecap="round"
		/> 
		</svg>
		
		
		
	</div>
	<div class="answer">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	
	
	
	</div>
	</div>
</div>
  
 </section>

 @include('shared.footer')
</body>
<script>
const faqs = document.querySelectorAll(".faq");

faqs.forEach(faq => {
	faq.addEventListener("click", () => {
		faq.classList.toggle("active");
	})
})
</script>
</html>