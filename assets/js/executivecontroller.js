const EXECUTIVE = {

}


$(".president-field").on("submit",function(event){
  event.preventDefault();

  var formData = new FormData(),
      imag = document.getElementById('presPhoto').files,
      name = $("#presName").val().trim(),
      level = $("#presLevel").val().trim(),
      position = $("#presPos").val().trim();


      checkVal(imag);

      formData.append("image",imag[0]);

      console.log(formData);
})






function checkVal(image){
  var fileType = ['image/png','image/jpg','image/jpeg'];

  if($.isArray(image.type,fileType) < 0){
    //Give error
    dropdownLoader("Image format is invalid","error");
  }
}
