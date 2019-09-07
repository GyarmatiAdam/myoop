///////////////////////////////////////////on group creat////////////////////////////////
$("#GroupForm").submit(function(event){
    event.preventDefault();
 
    if (request) {
        request.abort();
    }
 
    var $form = $(this);
 
    var $inputs = $form.find("input, select, button, textarea");
 
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
 
    request = $.ajax({
        url: "inc/action_group.php",
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
    $("#GroupForm")[0].reset();
 
    request.always(function () {
 
        $inputs.prop("disabled", false);
    });
 
 });
 
 ////////////////////////////////////////////on update///////////////////////////////////////////
$("#group_update").submit(function(event){
    event.preventDefault();
 
    if (request) {
        request.abort();
    }
 
    var $form = $(this);
 
    var $inputs = $form.find("input, select, button, textarea");
 
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
 
    request = $.ajax({
        url: "inc/action_group_update.php",
        type: "POST",
        data: serializedData
    });
 //success window// style and script ar included in navbar
    request.done(function (response, textStatus, jqXHR){
         Swal.fire({
             position: 'center',
             type: 'success',
             title: 'Data was successfully updated!',
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
 
    request.always(function () {
 
        $inputs.prop("disabled", false);
    });
 
 });
 