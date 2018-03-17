const constants = {
  updateSuccessImageURL : "../api/admin/updateSuccessImage.php",
  updateSuccessNoURL  :  "../api/admin/updateSuccessNo.php",
  deleteSuccessPostURL : "../api/admin/deleteSuccessPost.php",
  sliderImageURL     : "../api/admin/sliderImagePost.php",
  getSliderImagesURL : "../api/admin/getSlidersImages.php",
  deleteSliderImagesURL : "../api/controller/deleteslider.php",
  deleteSingleSliderURL : "../api/controller/deleteSingleSlider.php",
  editSliderPostURL : "../api/controller/editSliderPost.php"

};

//Some Methods will be called here
getSliderImages();



/**********************************/
/*Edit post scripts              */
/********************************/
$(".edit-success-submit").on("submit",function(event){
  event.preventDefault();
  var oldImge = $(".image-preview").attr('src'),
      editPostId = $("#number").val().trim(),
      editTitle = $(".successTitle").val().trim(),
      editMsg = $(".successMsg").val().trim();
  if(editTitle == "" || editMsg == ""){
    dropdownLoader("All fields are required!","error");
  }else{

  var newImg = document.getElementById('edit-image-post').files;

  if(newImg.length < 1){ //User maintains the same image
    var data = $.param({
      updateSuccessId : editPostId,
      updateSuccessTitle : editTitle,
      updateSuccessMsg : editMsg
    });

    //Let make a post request to php
    $.post(constants.updateSuccessNoURL, data,function(response){
      //console.log(response);
      if(response.success){
        dropdownLoader(response.message,"success");
          setTimeout(function(){
            $("#edit-success-modal").modal('hide');
            window.location.href = "post";
          },2000);
      }else if(!response.success){
        dropdownLoader(response.message,"error");
      }

    });
  }else{
    var formData = new FormData();

    formData.append("newImage",newImg[0]);
    var postUpdate = constants.updateSuccessImageURL + "?title="+editTitle+"&message="+editMsg+"&id="+editPostId

    $.ajax({
      url : postUpdate,
      type : 'POST',
      data : formData,
      enctype : 'multipart/form-data',
      contentType : false,
      processData : false,
      success : function(response){
        //console.log(response);
        if(response.success){
          dropdownLoader(response.message,"success");
            setTimeout(function(){
              $("#edit-success-modal").modal('hide');
              window.location.href = "post";
            },2000);
        }else if(!response.success){
          dropdownLoader(response.message,"error");
        }
      },
      error : function(error){
        console.log(error);
      }

    })
  }

}

});

//Sliders images and post can be found here
$(".slider-item-submit").on("submit",function(event){
  event.preventDefault();

  var formData = new FormData($(this)[0]);
  var title = $("#sliderPostTitle").val().trim(),
      message = $("#sliderPostMsg").val().trim(),
      image = document.getElementById('slider-post-image-item').files;

  checkValidity(image);

  if(image.length < 1){
    dropdownLoader("Please select a valid image or a valid image format","error");
  }else if(title == ""){
    dropdownLoader("Post title is required","error");
  }else if(message == "" ){
    dropdownLoader("Post message is required","error");
  }else{
      var sliderpost = constants.sliderImageURL+"?title="+title+"&message="+message

      $.ajax({
        url : sliderpost,
        type : 'POST',
        data : formData,
        enctype : 'multiparty/form-data',
        contentType : false,
        processData : false,
        success : function(response){
          console.log(response);
          if(response.success){
            dropdownLoader(response.message,"success");
            setTimeout(function(){
              $(".slider-item-submit")[0].reset();
              window.location.href="post";
            },2000)
          }else if(!response.success){
            dropdownLoader(response.message,"error");
            $(".slider-item-submit")[0].reset();
          }
        },
        error : function(error){
          //console.log(error);
        }
      })
  }

})



//Event to delete success post items
$(".delete-success-submit").on("submit",function(event){
  event.preventDefault();

  var id = $("#number").val();
  var data = $.param({
    deletePostId : id
  });

  $.post(constants.deleteSuccessPostURL,data,function(response){
    if(response.success){
      dropdownLoader(response.message,"success");
      setTimeout(function(){
        getAllSuccessPost();
        $("#delete-success-model").modal('hide');
      },2000)
    }else if(!response.success){
      dropdownLoader(response.message,"error");
    }
  });

})




//FUnctions for viewSuccess post
function viewSuccess(postObj){
  $("#number").val(postObj.id);
  $(".image-preview").prop("src","../uploads/images/successpost/"+postObj.image);
  $(".post-item-image-label").html("Item Selected");
  $(".successTitle").val(postObj.title);
  $(".successMsg").val(postObj.message);
  $("#edit-success-modal").modal('show');
}
//Functions for deleteSuccess post
function deleteSuccess(postObj){
  $("#number").val(postObj.id);
  $(".successTitle").html(postObj.title);

  $("#delete-success-model").modal('show');
}

function getSliderImages(){
  $.get(constants.getSliderImagesURL,function(response){
    console.log(response);
    $(".sliderImages").html(response);
  })
}


function checkValidity(image){
  var fileType = ["image/png","image/jpeg","image/jpg"];
  for (var i = 0; i < image.length; i++) {
    if($.inArray(image[i].type,fileType) < 0){
      document.getElementById('slider-post-image-item').value = "";
      $("#slider-post-item")[0].reset();
      dropdownLoader("Some images contains invalid format","error");
    }
  }

}


function viewSlider(item){
  $('.sliderTitle').val(item.title);
  $('.sliderMsg').val(item.post_body);
  $('#numText').val(item.id_text);
  $('#numImg').val(item.id_image);

  $('#edit-slider-model').modal('show');

  var size = item.images.length;

  console.log(item);

  var template = "";

  for (var i = 0; i < size; i++) {
    template += "<section class='col-md-4'>"+
                    "<img class='sliderMod'  src='../uploads/images/slider/"+item.images[i]+"'>"+
                  "<i class='fa fa-trash-o' id='pointme' onclick='deleImg("+i+","+item.id_image+")'></i>"+
                  "</section><br><br>";
  }

  $(".galImg").html(template);

}

function deleteSlider(item){
  $('.sliderTitle').html(item.title);
  $('#numText').val(item.id_text);
  $('#numImg').val(item.id_image);

  $('#delete-slider-model').modal('show');
}


function deleImg(imgNum,imageId){
  var img = imgNum;
  var i = imageId;

  var data = $.param({
    id : img,
    Id : i
  })

  $.post(constants.deleteSingleSliderURL , data , function(response){
    if(response.success){
      dropdownLoader(response.message,"success");
      getSliderImages();
      $('#edit-slider-model').modal('hide');
    }else if(!response.success){
      dropdownLoader(response.message,"error");
    }
  })
}

//Event for handling the slider delete
$('.delete-slider-submit').on("submit", function(event){
  event.preventDefault();

  var numText = $('#numText').val();
  var numImg = $('#numImg').val();

  var delData = $.param({
    numText : numText,
    numImg : numImg
  })

  $.post(constants.deleteSliderImagesURL, delData, function(response){
    if(response.success){
      getSliderImages();
      dropdownLoader(response.message,"success");
      $('#delete-slider-model').modal('hide');
    }else if(!response.success){
      dropdownLoader(response.message,"error");
    }
  })

});


//handling event for slider text update

$('.edit-slider-submit').on("submit",function(event){
  event.preventDefault();

  var title = $('.sliderTitle').val().trim(),
   message = $('.sliderMsg').val().trim(),
   textId = $('#numText').val().trim();

   if(title == "" || message == "" || textId == ""){
      dropdownLoader("All fields are required","error");
   }else{

   var data = $.param({
    title : title,
    message : message,
    textId : textId
   })

   $.post(constants.editSliderPostURL, data , function(response){
      if(response.success){
      dropdownLoader(response.message,"success");
      getSliderImages();
      $('#edit-slider-model').modal('hide');
    }else if(!response.success){
      dropdownLoader(response.message,"error");
    }
   })

  }

})