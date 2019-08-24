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
        Swal.fire({
            position: 'center',
            type: 'success',
            title: 'You are successfully registered!',
            showConfirmButton: false,
            timer: 1500
        })
    });

   request.fail(function (jqXHR, textStatus, errorThrown){
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            showConfirmButton: false,
            timer: 1500
        })
   });
//set the input fields empty
   $("#registerForm")[0].reset();

   request.always(function () {

       $inputs.prop("disabled", false);
   });

});

////////////////////////////on delete///////////////////////////////////////////////////
