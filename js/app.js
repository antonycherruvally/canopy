$(document).ready(function() {
   
 $("#search").keypress(function() {
   	
      
       var name = $('#search').val();
       
   $.ajax({
               
               type: "POST",
             
               url: "controler/searchresult.php",
              
               data: {
                 
                   search: name
               },
             
               success: function(data) {
                   
                   $(".tableresult").html(data);
                     $(".formcard").hide();
                      $(".tableresult").removeClass("col-lg-9"); 
                        $(".tableresult").addClass("col-md-12")
               }
           });
       
   });
});
