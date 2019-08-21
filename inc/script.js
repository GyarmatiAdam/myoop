////////////////registration//////////////////////////////////////////
var request;

$("#registerForm").submit(function(event){
   event.preventDefault();

   if (request) {
       request.abort();
   }

   var $form = $(this);

   var $inputs = $form.find("input, select, button, textarea");

   var serializedData = $form.serialize();
   $inputs.prop("disabled", true);

   request = $.ajax({
       url: "inc/action_register.php",
       type: "POST",
       data: serializedData
   });

   request.done(function (response, textStatus, jqXHR){
       alert("Success!");
   });

   request.fail(function (jqXHR, textStatus, errorThrown){

       alert(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   request.always(function () {

       $inputs.prop("disabled", false);
   });
});