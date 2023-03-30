const tnslider = tns({
    container:".slider",
    slideBy:1,
    speed:700,
    nav:true,
    navPosition:"bottom",
    autoPlay:true,
    autoPlayTimeout:7000,
    autoPlayButtonOutput:false,
    controlsContainer:"#controls",
    prevButton:".previous",
    nextButton: ".next",
})



$('nav ul li.btn span').click(function(){
    $('nav ul div.items').toggleClass("show");
    $('nav ul li.btn span').toggleClass("show");
  });