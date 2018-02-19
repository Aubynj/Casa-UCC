const constants = {
  updateSuccessImageURL : "../api/admin/updateSuccessImage.php",
  updateSuccessNoURL  :  "../api/admin/updateSuccessNo.php",
  deleteSuccessPostURL : "../api/admin/deleteSuccessPost.php"
};

//Some Methods will be called here





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
        console.log(response);
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





function viewSuccess(postObj){
  $("#number").val(postObj.id);
  $(".image-preview").prop("src","../uploads/images/successpost/"+postObj.image);
  $(".post-item-image-label").html("Item Selected");
  $(".successTitle").val(postObj.title);
  $(".successMsg").val(postObj.message);
  $("#edit-success-modal").modal('show');
}

function deleteSuccess(postObj){
  $("#number").val(postObj.id);
  $(".successTitle").html(postObj.title);

  $("#delete-success-model").modal('show');
}
