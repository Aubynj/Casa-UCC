const Bible_Quotation = {
  getQuotationURL : "http://labs.bible.org/api/?passage=votd&type=json"
}



getAllBibleQuotation();


function getAllBibleQuotation(){
//Make a ajax request to the bible quotation site and fetch it in json format
  $.ajax({
    type: 'GET',
    url: Bible_Quotation.getQuotationURL,
    dataType: 'jsonp', // <---- DataType setting to jsonp is important
    success:function(response){
      //Render the response in the section of lead and something class
      $(".lead").html(response[0].text);
      $(".something").html(response[0].bookname+" "+response[0].chapter+ ":"+response[0].verse);
    },
    error : function(response){
      console.log(response);
    }
  })
}
