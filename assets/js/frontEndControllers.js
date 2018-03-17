const FrontEndURL = {
  getSliderPostURL : "api/admin/getSliderController.php",
  getFourPostURL : "api/admin/getFourPostController.php",
  getSuccessPostURL : "api/admin/getSuccessPostController.php",
  getGalleryImg : "api/admin/getGalleryImages.php",
  mailListURL : "api/admin/mailingList.php",
  getGalleryView : "api/admin/galleryView.php",
  fetchPageDataURL : "api/admin/fetchDepartments.php"
};

//SOme Methods are called here
getSliderPost();
getFourPost();
getSuccessPost();
getGalleryPhotos();
getDepartment();

//Method to call sliderposts
function getSliderPost(){
  $.get(FrontEndURL.getSliderPostURL,function(response){
    //console.log(response);
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
    //console.log(response);
  })
}

function popUpPhto(imageObj){
  $('.modal').modal('show');

  var id = imageObj.id;

  var data = $.param({
    ID : id
  });

  $.post(FrontEndURL.getGalleryView, data, function(response){
    console.log(response);
    $('.modal-image').html(response);
  })
}


function ResetImage(){
  $('.modal').modal('hide');
}

$('.contact-submit').on("submit",function(event){
  event.preventDefault();

  var email = $('.mailE').val().trim(),
      subject = $('.subject').val().trim(),
      message = $('.message').val().trim();

      if(email == "" || subject == "" || message == ""){
        $('#res').html("All fields are required").addClass('invalid');
      }else{

        var data = $.param({
            email : email,
            subj : subject,
            message : message
          });

  //console.log(data);

    $.post(FrontEndURL.mailListURL,data,function(response){
      console.log(response);
      if(response.success){
        $('#res').html(response.message).removeClass('invalid').addClass('valid').fadeIn(1000).fadeOut(7000);
        $('#contact-sub')[0].reset();
      }else if(!response.success){
        $('#res').html(response.message).removeClass('valid').addClass('invalid').fadeIn(1000).fadeOut(7000);
      }else if(response.exist){
        $('#res').html(response.message).removeClass('valid').addClass('invalid').fadeIn(1000).fadeOut(7000);
      }
    })

      }

});


function getDepartment(){
  $.get(FrontEndURL.fetchPageDataURL,function(response){
    console.log(response);
    $('.department-sec').html(response);
  })
}

