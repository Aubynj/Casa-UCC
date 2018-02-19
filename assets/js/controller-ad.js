//Defining some constants variables
const CONSTANTS = {
  getAdminLoginPageURL : "../api/admin/getLoginPage.php",
  getAdminAllPostURL : "../api/admin/getAllPostItems.php",
  getSuccessPostURL : "../api/admin/getAllSuccessPost.php",
  postItemURL     : "../api/admin/postItem.php",
  getFrontPostURL : "../api/admin/getFrontPost.php",
  pushSuccessPostURL : "../api/admin/pushSuccessPost.php",
  postGalleryImgURL : "../api/admin/multiGallery.php",
  updateWithoutImageURL : "../api/admin/updateWithoutImage.php",
  updateWithImage  :  "../api/admin/updateWithImage.php",
  deletePostItemUrl : "../api/admin/deletePostItem.php"
};

//Initialising some Methods
getAllPostItems();
getAllSuccessPost();









$(".admin-form").on("submit",function(event){
  event.preventDefault();

  var adminName = $("#username").val().trim(),
      adminPass = $("#password").val().trim();

  if(adminName == "" || adminPass == ""){
    dropdownLoader("Sorry Username/Password cannot be empty","error")
  }else{

    //Let pass correct data info into database for validating
    dropdownLoader("Signing in...","progress");

    var data = $.param({
      username : adminName,
      password : adminPass
    });

    console.log(data);

    $.post(CONSTANTS.getAdminLoginPageURL,data,function(response){
      console.log(response);
      if (response.success){
        dropdownLoader("Sucessfully login. Please wait...","success");
        setTimeout(function(){
          window.location.href = "dashboard";
        },4000);
      }else if(!response.success){
        dropdownLoader("Username/Password commbination is incorrect","error");
      }
    })
  }
})

//Event to handle the image if it is selected
$(".input-file").on("change",function(){
  var file = document.getElementById('post-image-item').files;
  $(".post-item-image-label").html("Item is selected");

  var reader = new FileReader();
	reader.onload = function (e) {
	    $(".image-preview").attr('src', e.target.result);
	}
	reader.readAsDataURL(file[0]);
})

//Event to handle image if it edited
$(".input-file-edit").on("change",function(){
  var file = document.getElementById('edit-image-post').files;
  $(".post-item-image-label").html("Item is selected");

  var reader = new FileReader();
	reader.onload = function (e) {
	    $(".image-preview").attr('src', e.target.result);
	}
	reader.readAsDataURL(file[0]);
})

//Success owns
$(".success-input-file").on("change",function(){
  var file = document.getElementById('success-post-image-item').files;
  $(".post-item-image-label").html("Item is selected");

  var reader = new FileReader();
	reader.onload = function (e) {
	    $(".image-preview").attr('src', e.target.result);
	}
	reader.readAsDataURL(file[0]);
})

//Event to submit all front post items
$(".post-item-submit").on("submit",function(event){
  event.preventDefault();


  var formData = new FormData(),
      postImg = document.getElementById('post-image-item').files,
      postTitle = $(".postTitle").val().trim(),
      postMsg  = $(".postMsg").val().trim();

      //Validate all data processes
      if(postImg.length < 1){
        dropdownLoader("Please specify Image for the post","error");
      }else if(postTitle == "" || postMsg == ""){
        dropdownLoader("Please all fields are require","error");
      }else{

        //Sending data to ajax
        formData.append("postImage",postImg[0]);
        var postDataUrl = CONSTANTS.postItemURL + "?title="+postTitle+"&message="+postMsg

        $.ajax({
          url : postDataUrl,
          type : 'POST',
          data : formData,
          enctype : 'multipart/form-data',
          contentType : false,
          processData : false,
          success : function(response,textStatus,jqXHR){

            console.log(response);
            if(response.success){
              dropdownLoader(response.message,"success");
              setTimeout(function(){
                $("#add-post-model").modal('hide');
              //  $("#post-item")[0].reset();
                window.location.href="front";
              },3000);
            }else if(response.invalid){
              dropdownLoader(response.invalid,"error");
            }
          },
          error : function(error){
            console.log(error);
          }

        })
      }
})

//**************************************************************
//Event to submit all Success post  items
$("#success-post-item").on("submit",function(event){
  event.preventDefault();

  var formData = new FormData(),
      postImg = document.getElementById('success-post-image-item').files,
      postTitle = $(".successPostTitle").val().trim(),
      postMsg  = $(".successPostMsg").val().trim();

      //Validate all data processes
      if(postImg.length < 1){
        dropdownLoader("Please specify Image for the post","error");
      }else if(postTitle == "" || postMsg == ""){
        dropdownLoader("Please all fields are require","error");
      }else{

        //Sending data to ajax
        formData.append("postImage",postImg[0]);
        var postDataUrl = CONSTANTS.pushSuccessPostURL + "?title="+postTitle+"&message="+postMsg

        $.ajax({
          url : postDataUrl,
          type : 'POST',
          data : formData,
          enctype : 'multipart/form-data',
          contentType : false,
          processData : false,
          success : function(response,textStatus,jqXHR){

            console.log(response);
            if(response.success){
              dropdownLoader(response.message,"success");
              setTimeout(function(){
                $("#add-success-model").modal('hide');
              //  $("#post-item")[0].reset();
                window.location.href="front";
              },3000);
            }else if(response.invalid){
              dropdownLoader(response.invalid,"error");
            }
          },
          error : function(error){
            console.log(error);
          }

        })
      }
})




//Multiple images uploads comes here
$(".multiImage").on("submit",function(event){
  event.preventDefault();
  var subject = $("#subject").val().trim(),
      img = $("#multi-file").val().trim();

  if(subject == "" || img == ""){
    dropdownLoader("Fields cannot be empty","error");
  }else{

      var formData = new FormData($(this)[0]);

      $.ajax({
        url : CONSTANTS.postGalleryImgURL,
        type : 'POST',
        data : formData,
        enctype : 'multipart/form-data',
        contentType : false,
        processData : false,

        success : function(response){
          console.log(response);
          if(response.success){
            dropdownLoader(response.message,"success");
            $(".multiImage")[0].reset();
          }else if(!response.success){
            dropdownLoader(response.message,"error");
            $(".multiImage")[0].reset();
          }

        },
        error : function(error){
          console.log(error);
        }
      })
    }

    //console.log(galleryImages);
})




/**********************************/
/*Edit post scripts              */
/********************************/
$(".edit-post-submit").on("submit",function(event){
  event.preventDefault();
  var oldImge = $(".image-preview").attr('src'),
      editPostId = $("#number").val().trim(),
      editTitle = $(".postTitle").val().trim(),
      editMsg = $(".postMsg").val().trim();
  if(editTitle == "" || editMsg == ""){
    dropdownLoader("All fields are required!","error");
  }else{

  var newImg = document.getElementById('edit-image-post').files;

  if(newImg.length < 1){ //User maintains the same image
    var data = $.param({
      updatePostId : editPostId,
      updateTitle : editTitle,
      updateMsg : editMsg
    });

    //Let make a post request to php
    $.post(CONSTANTS.updateWithoutImageURL, data,function(response){

      if(response.success){
        dropdownLoader(response.message,"success");
          setTimeout(function(){
            $("#edit-post-modal").modal('hide');
            window.location.href = "post";
          },2000);
      }else if(!response.success){
        dropdownLoader(response.message,"error");
      }

    });
  }else{
    var formData = new FormData();

    formData.append("newImage",newImg[0]);
    var postUpdate = CONSTANTS.updateWithImage + "?title="+editTitle+"&message="+editMsg+"&id="+editPostId

    $.ajax({
      url : postUpdate,
      type : 'POST',
      data : formData,
      enctype : 'multipart/form-data',
      contentType : false,
      processData : false,
      success : function(response){
        console.log(response);
        if(response.success){
          dropdownLoader(response.message,"success");
            setTimeout(function(){
              $("#edit-post-modal").modal('hide');
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

})


//Script to delete every post items
$(".delete-post-submit").on("submit",function(event){
  event.preventDefault();

  var id = $("#number").val();
  var data = $.param({
    deletePostId : id
  });

  $.post(CONSTANTS.deletePostItemUrl,data,function(response){
    if(response.success){
      dropdownLoader(response.message,"success");
      setTimeout(function(){
        getAllPostItems();
        $("#delete-post-model").modal('hide');
      },2000)
    }else if(!response.success){
      dropdownLoader(response.message,"error");
    }
  });


})

//This is the snackbar loader
function dropdownLoader(text, imageType){
  if(!imageType){
    $(".").hide();
  }else if(imageType == "error"){
    $(".icon-error").show();
    $(".icon-success").hide();
    $(".dropdown-loader").hide();
  }else if(imageType == "progress"){
    $(".icon-error").hide();
    $(".icon-success").hide();
    $(".dropdown-loader").show();
  }else if(imageType == "success"){
    $(".icon-error").hide();
    $(".icon-success").show();
    $(".dropdown-loader").hide();
  }

  $(".dropdown-text").html(text);
  $(".dropdownLoader").addClass("show").removeClass("hide");

  setTimeout(function(){
    hideLoader();
  },10000);
}

function hideLoader(){
  $(".dropdownLoader").addClass("hide").removeClass("show");
  $(".dropdown-text").html("");
}


//Function to get all post items
function getAllPostItems(){
  $.get(CONSTANTS.getAdminAllPostURL,function(response){
    console.log(response);
    $(".postItems").html(response);
  })
}

function getFrontPost(){
  $.get(CONSTANTS.getFrontPostURL,function(response){
    $(".front_res").html(response);
  })
}

function getAllSuccessPost(){
  $.get(CONSTANTS.getSuccessPostURL,function(response){
    console.log(response);
    $(".successItems").html(response);
  })
}

function viewPost(postObj){
  $("#number").val(postObj.id);
  $(".image-preview").prop("src","../uploads/images/frontpost/"+postObj.image);
  $(".post-item-image-label").html("Item Selected");
  $(".postTitle").val(postObj.title);
  $(".postMsg").val(postObj.message);
  $("#edit-post-modal").modal('show');
}

function deletePost(postObj){
  $("#number").val(postObj.id);
  $(".postTitle").html(postObj.title);

  $("#delete-post-model").modal('show');
}
