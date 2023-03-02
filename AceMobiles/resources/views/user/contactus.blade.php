<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  @include('shared.header')
  <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
</head>

<body>
 
  <section id = "width">
  @include('shared.navbar')
    <div class="section-header">
      <div class="container">
        
        <h2>Contact Us</h2>
        <p>At Ace Mobiles, we prioritise customer satisfaction. Simply contact us through one of our contact options below if you are unhappy with our service or would like to get in touch and our customer service team will get back to you. </p>
        <br>
        <p>Please note that our office hours are: </p>
        <p>Monday - Friday: 9am - 5pm</p>
        <p>Saturday & Sunday: 10am - 3pm</p>
      </div>
    </div>
    
    <div class="container">
      <div class="row">
        
        <div class="contact-info">
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-home"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Address</h4>
              <p>Aston St,<br/> Birmingham, <br/>B4 7ET</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-phone"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Phone</h4>
              <p>0121 204 3000</p>
            </div>
          </div>
          
          <div class="contact-info-item">
            <div class="contact-info-icon">
              <i class="fas fa-envelope"></i>
            </div>
            
            <div class="contact-info-content">
              <h4>Email</h4>
             <p>acemobiles@outlook.com</p>
            </div>

          </div>
          
        </div>

        
        
        <div class="contact-form">

          <form action="" id="contact-form">
            <h2>Send Message</h2>
            <div class="input-box">
              <input type="text" required="true" name="">
              <span>Full Name</span>
            </div>
            
            <div class="input-box">
              <input type="email" required="true" name="">
              <span>Email</span>
            </div>
            
            <div class="input-box">
              <textarea required="true" name=""></textarea>
              <span>Type your Message...</span>
            </div>
            
            <div class="input-box">
              <input type="submit" value="Send" name="">
            </div>
          </form>
        </div>
        
      </div>

      <h2 class="sub-heading">Connect with us </h2>
      <ul class="sci">
        
        <li><a href="https://www.facebook.com/AceMobiles.arif"><ion-icon name="logo-facebook"></ion-icon> </a></li>
        <li><a href="https://twitter.com/ACE_Mobile"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="https://in.linkedin.com/company/ace-mobile"><ion-icon name="logo-linkedin"></ion-icon> </a></li>
        <li><a href="https://www.instagram.com/acemobiles/?hl=en"><ion-icon name="logo-instagram"></ion-icon> </a></li>
      </ul>
    </div>
    @include('shared.footer')
  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</script>
</body>
</html>
