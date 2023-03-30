<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ace Mobiles | About Us</title>
    <link href="AceAbout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
 @include('shared.navbar')
    <center>
        <h1>About Us</h1>
        <h2>History</h2>
        <p>Since 2005, we have been helping to give customers a wide range of high-quality mobile products.<br>
        Our company started as a humble little shop in Birmingham offering phone repairs to passers-by.<br>
        Since then, our company has expanded to over 200 stores across the UK as well as the website you are in right now!</p>
        <h2>Values</h2>
        <p>We ensure that that we fulfil our core values as a company.<br>
        Our core values include customer satisfaction, transparency, innovation, sustainability and responsibility.<br>
        We at Ace Mobiles work together to ensure that customers get the best deals by providing the latest models that <br>
        would suit them best and giving them details on everything that goes on during the purchasing process. We also aim to <br>
        support them whenever they are unsatisfied with a product as customer satisfaction is our number one priority!</p>
		
        <div class="home_img">
            <div class="home_img__text_section_container">
                <img src={{asset('phonepeople.jpg" class="home_img__image')}}>
                <div class="home_img__text_section_container">
                    <span class="home_img__text_1">Quality deals for everyone!</span>
                    <span class="home_img__text_2">Our policies ensure that our customers get the best, personalized PRIME deals!</span>
                </div>
            </div>
        </div>
    </center>
    <center>
        <h2>Awards</h2>
			<h3>Thanks to your support, we have won many awards!</h3>
			<div class="row">
			  <div class="column">
				<img src={{asset('retailer.png')}} alt="test1" style="width: 50%">
			  </div>
			  <div class="column">
				<img src="{{asset('MIA.png"')}} alt="test2" style="width: 50%">
			  </div>
			  <div class="column">
				<img src="{{asset('choice.png')}} alt="test3" style="width: 50%">
			  </div>	
			</div>
    </center>
    <section>
        <h2 class="title">FAQS</h2>
        <div class="container2">
            <div class="faq">
                <div class="question">
                    <h3>How can I contact the website's support team?</h3>
                    <svg width="15" height="10" viewbox="0 0 42 5">
                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/> 
                    </svg>
                </div>
                <div class="answer">
                    <p>If you have any queries, you can visit the Contact page on our website where you are able to choose between sending us an email or giving our team a call!</p>
                </div>
            </div>
            <hr>
            <div class="faq">
                <div class="question">
                    <h3>Can I upgrade my phone to a newer model after purchasing?</h3>
                    

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
	<p>Yes, that is possible! We ask that you keep the receipt of the current phone model that you have so that we can process your request and give you an upgraded model for a smaller price!</p>
	
	
	
	</div>
	</div>
	<hr>
		<div class="faq">
	
	
	
	<div class="question">
		<h3>What is the refund policy for Ace Mobiles?</h3>
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
	<p>We want customers to be completely satisfied with their purchases. If you are not satisfied with a product, you can return it within 7 days of delivery, whether it's damaged, defective or not the product you wanted. Go to our contact page to ask our team about any needed refunds.</p>
	
	
	
	</div>
	</div>
	
	
	<hr>
	<div class="faq">
	
	
	
	<div class="question">
		<h3>Can I purchase accessories for my phone on your website?</h3>
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
	<p>Accessories are not really available whe you shop with us just yet. However, we have plans in the future to offer a range of accessories for various mobile phone models on our website such as phone cases, screen protectors, chargers, headphones and more!</p>
	
	
	
	</div>
	</div>
	
	<hr>
	
	<div class="faq">
	
	
	
	<div class="question">
		<h3>Do you offer any warranty on your products?</h3>
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
	<p>We reccomend that you read the warranty terms on a product before purchasing. The warranty terms can vary for different products.</p>
	
	
	
	</div>
	</div>
	
	
	
</div>
  
 </section>


</body>
@include('shared.footer')
<script>
const faqs = document.querySelectorAll(".faq");

faqs.forEach(faq => {
	faq.addEventListener("click", () => {
		faq.classList.toggle("active");
	})
})
</script>
</html>
