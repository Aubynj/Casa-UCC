const FrontEndURL = {
  getSliderPostURL : "api/admin/getSliderController.php",
  getFourPostURL : "api/admin/getFourPostController.php",
  getSuccessPostURL : "api/admin/getSuccessPostController.php",
  getGalleryImg : "api/admin/getGalleryImages.php"
};

//SOme Methods are called here
getSliderPost();
getFourPost();
getSuccessPost();
getGalleryPhotos();

//Method to call sliderposts
function getSliderPost(){
  $.get(FrontEndURL.getSliderPostURL,function(response){
    console.log(response);
    $('.slider_Post').html(response);
  })
}

function getFourPost(){
  $.get(FrontEndURL.getFourPostURL,function(response){
    $('.front_res').html(response);
  })
}

function getSuccessPost(){
  $.get(FrontEndURL.getSuccessPostURL,function(response){
    $('.success_post').html(response);
  })
}

function getGalleryPhotos(){
  $.get(FrontEndURL.getGalleryImg, function(response){
    $('.gallery_res').html(response);
    console.log(response);
  })
}

function popUpPhto(imageObj){
  $('.modal').modal('show');
  var images = imageObj.image_name;


  for (var i = 0; i < images.length; i++) {
    $('#galleryImg').attr('src',images[i]);
  }
}

function closeModal(){
  $('#modal').modal('hide');
  console.log("Hey");
}
