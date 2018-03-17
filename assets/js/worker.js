const CKEDIT = {
    storeLargeDataURL : "../api/admin/postLargeData.php",
    getCKEDITORURL : "../api/admin/largeData.php",
    automaticURL : "../api/admin/automatic.php"
}

var dataInfo;



//Some methods are here
getCKEDITOR();


//Submission for CKEDITOR

$('.form-ck').on("submit",function(event){
    event.preventDefault();

    for( instance in CKEDITOR.instances){
        CKEDITOR.instances[instance].updateElement();
    }

    var postData = $('#postMsg').val().trim(),
        id = $('#id').val().trim();

        var data = $.param({
            pageTxt : postData,
            id : id
        });

        $.ajax({
        url : CKEDIT.storeLargeDataURL,
        type : 'POST',
        data : data,
        enctype : 'multipart/form-data',
        scontentType : false,
        processData : false,
        success : function(response,textStatus,jqXHR){
            if(response.success){
                dropdownLoader(response.message,"success");
            }else if(!response.success){
                $(".status").html(response.message);
            }
        },
        error : function(response){
            console.log(response);
        }

    })

})


//Automatic saving begins from here
setInterval(function(){
    
    $(".status").fadeIn(100);
    $(".status").html("Saving...");

    //Allow automatic saving
    for(instance in CKEDITOR.instances){
        CKEDITOR.instances[instance].updateElement();
    }

        var formMsg = $('#postMsg').val().trim(),
            msgId = $("#id").val().trim();

            dataInfo = $.param({
                msg : formMsg,
                id : msgId
            });
            
    
},90000);

setInterval(function(){
    

       $.ajax({
        url : CKEDIT.automaticURL,
        type : 'POST',
        data : dataInfo,
        enctype : 'multipart/form-data',
        scontentType : false,
        processData : false,
        success : function(response,textStatus,jqXHR){
            if(response.success){
                $(".status").html(response.message);
            }else if(!response.success){
                $(".status").html(response.message);
            }
        }

    })

},100000)


setInterval(function(){
    $(".status").fadeOut(300);
},110000)
 


function getCKEDITOR(){
    $.get(CKEDIT.getCKEDITORURL,function(response){
        $(".plugEditor").val(response.data);
        $('#id').val(response.id);    
    });
    
}