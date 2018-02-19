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

})
