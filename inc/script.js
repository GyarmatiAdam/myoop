//////////////////////////registration//////////////////////////////////////////
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
//success window// style and script ar included in navbar
   request.done(function (response, textStatus, jqXHR){
        Swal.fire(
        "Hooray!",
        "You are successfully registered. Now you can login!",
        "success"
        );
    });

   request.done(function (response, textStatus, jqXHR){
       console.log("Success!");
   });

   request.fail(function (jqXHR, textStatus, errorThrown){

       console.log(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });
//set the input fields empty
   $("#registerForm")[0].reset();

   request.always(function () {

       $inputs.prop("disabled", false);
   });

});