const EXECUTIVE = {
  getPresidentURL : "../api/admin/presidentBoard.php",
  getExecutiveURL : "../api/admin/executiveBoard.php",
  getAllExecutiveURL : "../api/admin/executiveMembers.php",
  pushEditPresURL : "../api/admin/pushPresNoImage.php",
  pushEditPresImgURL : "../api/admin/editPresidentData.php",
  deletePresDataURL : "../api/admin/deletePresidentData.php",
  pushEditExecURL : "../api/admin/editExecutiveNoImage.php",
  deleteExecDataURL : "../api/admin/deleteExecutiveData.php",
  executiveEditURL : "../api/admin/editExecutiveData.php",
  getPresidentDataURL : "api/admin/getAllPresidents.php",
  getExecutiveDataURL : "api/admin/getAllExecutivesData.php"
}



//Some methods will be display here
getAllExecutive();
getPresidentAllData();
getExecutiveData();

//POst events for presidents
$(".president-field").on("submit",function(event){
  event.preventDefault();

  var imag = document.getElementById('presPhoto').files,
      name = $("#presName").val().trim(),
      level = $("#presLevel").val().trim(),
      position = $("#presPos").val().trim();


      checkImageFormat(imag);

      if(imag.length < 1){
        dropdownLoader("Image contains invalid format","error");
      }else if(name == "" || level == "" || position == ""){
        dropdownLoader("All fields are required","error");
      }else {
        var formData = new FormData($(this)[0]);

        formData.append("imageName",imag[0]);

        var presidentPostURL = EXECUTIVE.getPresidentURL + "?name=" + name +"&position="+position+"&level=" + level;

        $.ajax({
          url : presidentPostURL,
          type : 'POST',
          data : formData,
          enctype : 'multipart/form-data',
          contentType : false,
          processData : false,
          success: function(response,textStatus,jqXHR){
            console.log(response);
            if(response.success){
              $('#presForm')[0].reset();
              document.getElementById('presPhoto').value = "";
              $('.image-preview-pres').attr('src','../assets/img/item-img-preview.png');
              dropdownLoader(response.message,"success");
            }else if(!response.success){
              dropdownLoader(response.message,"error");
            }
          },
          error : function(response){
            console.log(response);
          }

        })

      }

});

//image preview
$('.input-pres').on("change",function(){
  var file = document.getElementById('presPhoto').files;

  var reader = new FileReader();
  reader.onload = function(e){
    $('.image-preview-pres').attr('src',e.target.result);
  }
  reader.readAsDataURL(file[0]);
})


//POst event for executives
$(".executive-field").on("submit",function(event){
  event.preventDefault();

  var imag = document.getElementById('execPhoto').files,
      name = $("#execName").val().trim(),
      level = $("#execLevel").val().trim(),
      position = $("#execPos").val().trim();


      checkImageFormat(imag);

      if(imag.length < 1){
        dropdownLoader("Image contains invalid format","error");
      }else if(name == "" || level == "" || position == ""){
        dropdownLoader("All fields are required","error");
      }else {
        var formData = new FormData($(this)[0]);

        formData.append("imageName",imag[0]);

        var ExecutivePostURL = EXECUTIVE.getExecutiveURL + "?name=" + name +"&position="+position+"&level=" + level;

        $.ajax({
          url : ExecutivePostURL,
          type : 'POST',
          data : formData,
          enctype : 'multipart/form-data',
          contentType : false,
          processData : false,
          success: function(response,textStatus,jqXHR){
            console.log(response);
            if(response.success){
              $('#exec-Form')[0].reset();
              document.getElementById('execPhoto').value = "";
              $('.image-preview-exec').attr('src','../assets/img/item-img-preview.png');
              dropdownLoader(response.message,"success");
            }else if(!response.success){
              dropdownLoader(response.message,"error");
            }
          },
          error : function(response){
            console.log(response);
          }

        })

      }

});


$('.input-exec').on("change",function(){
  var file = document.getElementById('execPhoto').files;

  var reader = new FileReader();
  reader.onload = function(e){
    $('.image-preview-exec').attr('src',e.target.result);
  }

  reader.readAsDataURL(file[0]);
});


//Edit president info
$('.pres-item-submit').on("submit",function(event){

  event.preventDefault();

  var image = document.getElementById('post-image-item').files,
      name = $('.presName').val().trim(),
      id = $('.presId').val().trim(),
      level = $('.presLevel').val().trim(),
      position = $('.presPos').val().trim();

      if(image.length < 1){
        console.log("contains no image");

        //Validating fields 
        if(name == "" || level == "" || position == "" ){
          dropdownLoader("All fields are require","error");
        }else{

          var data = $.param({
          name : name,
          id  : id,
          level : level,
          position : position
        })
        
          $.post(EXECUTIVE.pushEditPresURL,data,function(response){
            if(response.success){
              $("#pres-item")[0].reset();
              getAllExecutive();
              dropdownLoader(response.message,"success");
              $("#edit-pres-model").modal('hide');
            }else if(!response.success){
              dropdownLoader(response.message,"error");
            }
          })
        }
      }else{
        //Let get new image to be inserted
        checkImageFormat(image);
        
        if(image.length < 1){
        dropdownLoader("Image contains invalid format","error");
      }else if(name == "" || level == "" || position == ""){
        dropdownLoader("All fields are required","error");
      }else {
        var formData = new FormData($(this)[0]);

        formData.append("imageName",image[0]);

        var presidentEditURL = EXECUTIVE.pushEditPresImgURL + "?name=" + name +"&position="+position+"&level=" + level +"&id="+id;
        
        $.ajax({
          url : presidentEditURL,
          type : 'POST',
          data : formData,
          enctype : 'multipart/form-data',
          contentType : false,
          processData : false,
          success: function(response,textStatus,jqXHR){
            console.log(response);
            if(response.success){
              $("#pres-item")[0].reset();
              getAllExecutive();
              dropdownLoader(response.message,"success");
              $("#edit-pres-model").modal('hide');
            }else if(!response.success){
              dropdownLoader(response.message,"error");
            }
          },
          error : function(response){
            console.log(response);
          }

        });

      }
  }
})

//President DeleteItem
$('.pres-delete-submit').on("submit",function(event){
    event.preventDefault();

    var presId = $('.presId').val().trim();

    var data = $.param({
      id : presId
    });

    $.post(EXECUTIVE.deletePresDataURL,data,function(response){

      if(response.success){
        dropdownLoader(response.message,"success");
        getAllExecutive();
        $('#delete-pres-model').modal('hide');
      }else if(!response.success){
        dropdownLoader(response.message,"error");

      } 
    });

})

//Executive Editing
$('.exec-edit-submit').on("submit",function(event){

  event.preventDefault();

  var image = document.getElementById('post-image-item').files,
      name = $('.execName').val().trim(),
      id = $('.execId').val().trim(),
      level = $('.execLevel').val().trim(),
      position = $('.execPos').val().trim();

      if(image.length < 1){
        console.log("contains no image");

        //Validating fields 
        if(name == "" || level == "" || position == "" ){
          dropdownLoader("All fields are require","error");
        }else{

          var data = $.param({
          name : name,
          id  : id,
          level : level,
          position : position
        });

          console.log(data);
        
          $.post(EXECUTIVE.pushEditExecURL,data,function(response){
            console.log(response);
            if(response.success){
              $("#exec-item")[0].reset();
              getAllExecutive();
              dropdownLoader(response.message,"success");
              $("#edit-exec-model").modal('hide');
            }else if(!response.success){
              dropdownLoader(response.message,"error");
            }
          })
        }
      }else{
        //Let get new image to be inserted
        checkImageFormat(image);
        
        if(image.length < 1){
        dropdownLoader("Image contains invalid format","error");
      }else if(name == "" || level == "" || position == ""){
        dropdownLoader("All fields are required","error");
      }else {
        var formData = new FormData($(this)[0]);

        formData.append("imageName",image[0]);

        var executiveEdit = EXECUTIVE.executiveEditURL + "?name=" + name +"&position="+position+"&level=" + level +"&id="+id;
        
        $.ajax({
          url : executiveEdit,
          type : 'POST',
          data : formData,
          enctype : 'multipart/form-data',
          contentType : false,
          processData : false,
          success: function(response,textStatus,jqXHR){
            console.log(response);
            if(response.success){
              $("#exec-item")[0].reset();
              getAllExecutive();
              dropdownLoader(response.message,"success");
              $("#edit-exec-model").modal('hide');
            }else if(!response.success){
              dropdownLoader(response.message,"error");
            }
          },
          error : function(response){
            console.log(response);
          }

        });

      }
  }
})

//Executive Delete
$('.exec-delete-submit').on("submit",function(event){
    event.preventDefault();

    var execId = $('.execId').val().trim();

    var data = $.param({
      id : execId
    });
    
    $.post(EXECUTIVE.deleteExecDataURL,data,function(response){

      if(response.success){
        dropdownLoader(response.message,"success");
        getAllExecutive();
        $('#delete-exec-model').modal('hide');
      }else if(!response.success){
        dropdownLoader(response.message,"error");

      } 
    });

})

//Logic functions 
function getAllExecutive(){
  $.get(EXECUTIVE.getAllExecutiveURL, function(response){
    $('.executive').html(response);
  })
}

function getPresidentAllData(){
  $.get(EXECUTIVE.getPresidentDataURL, function(response){
    $('.presidentData').html(response)
  })
}

function getExecutiveData(){
  $.get(EXECUTIVE.getExecutiveDataURL, function(response){
    console.log(response);
    $('.executiveData').html(response);
  })
}

//President
function editPres(data){
  $('.presId').val(data.id);
  $('.presName').val(data.name);
  $('.presLevel').val(data.level);
  $('.presPos').val(data.position);
  $('.image-preview').attr('src','../uploads/images/executives/'+data.photo);

  $('#edit-pres-model').modal('show');
}

function delePres(data){
  $('.presId').val(data.id);
  $('.presTitle').html(data.position);
  $('#delete-pres-model').modal('show');
}


/************************************************/
//Executives
function editExec(data){
  $('.execId').val(data.id);
  $('.execName').val(data.name);
  $('.execLevel').val(data.level);
  $('.execPos').val(data.position);
  $('.image-preview').attr('src','../uploads/images/executives/'+data.photo);

  $('#edit-exec-model').modal('show');
}

function deleExec(data){
  $('.execId').val(data.id);
  $('.execTitle').html(data.position);
  $('#delete-exec-model').modal('show');
}


function checkImageFormat(image){
  var file = image[0];
  var fileImage = file['type'];
  var fileType = ["image/png","image/jpg","image/jpeg"];

  if($.inArray(fileImage,fileType) < 0){
    console.log("Error occur");
    document.getElementById('presPhoto').value = "";
    document.getElementById('execPhoto').value = "";
    dropdownLoader("Image contains invalid format","error");
  }
}
