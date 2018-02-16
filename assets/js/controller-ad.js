//Defining some constants variables
const CONSTANTS = {
  getAdminLoginPageURL : "../api/admin/getLoginPage.php",
  getAdminAllPostURL : "../api/admin/getAllPostItems.php",
  postItemURL     : "../api/admin/postItem.php",
  getFrontPostURL : "../api/admin/getFrontPost.php"
};

//Initialising some Methods
getAllPostItems();










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

//Event to submit all post items
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



      //Add file to FormData
      //

      //console.log(formData.getAll);
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
