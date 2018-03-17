$(function(){
  //Initializing WOW js Animation scripts
  new WOW().init();

  $('button.bar').click("on",function(){

    //$(".move").html("Hello");

    document.getElementById('sideNav').style.width = '100%';
  })

  $('a.closeSide').click("on",function(){

    document.getElementById('sideNav').style.width = '0px';
  })

  $('.carousel').carousel({
	  interval: 7000
	}); 


  $('body').scrollspy({ target: '#contact', offset : 50 });

  $(".cont").click(function(event) {

    console.log("NIce work");
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });

    }

  })

  //tooltip
  $('[data-toggle="tooltip"]').tooltip();

  $('.subject').tooltip('show');

})
