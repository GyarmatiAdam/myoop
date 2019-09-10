///////////////////////////////////////////on group create////////////////////////////////
var request;

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
        url: "group/action_group.php",
        type: "POST",
        data: serializedData
    });
 //success window// style and script ar included in navbar
    request.done(function (response, textStatus, jqXHR){
         Swal.fire({
             position: 'center',
             type: 'success',
             title: 'You are successfully created!',
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
        url: "group/action_group_update.php",
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
 
 ////////////////////////////on delete///////////////////////////////////////////////////
$(document).ready(function(){
    $('#delete_group').click(function(){
        if(confirm("Do you really want to delete?"))
        {
            var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length === 0)
            {
                alert("Please Select Checkbox");
            }
            else
            {
                $.ajax({
                url:"group/group_delete.php",
                method: "POST",
                data:{group_id:id}, 
                success:function()
                {
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: 'Deleted!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    for(var i =0; i<id.length; i++)
                    {
                        $('div#'+id[i]+'').css('background-color', '#ccc');
                        $('div#'+id[i]+'').fadeOut('slow');
                    }
                }
            });
            }
        }
    });
});

///////////////////////////////////////////on group join////////////////////////////////
var request;

$("#joinForm").submit(function(event){
    event.preventDefault();
 
    if (request) {
        request.abort();
    }
 
    var $form = $(this);
 
    var $inputs = $form.find("input, button");
 
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
 
    request = $.ajax({
        url: "group/action_join.php",
        type: "POST",
        data: serializedData
    });
 //success window// style and script ar included in navbar
    request.done(function (response, textStatus, jqXHR){
         Swal.fire({
             position: 'center',
             type: 'success',
             title: 'You are successfully Joined!',
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

  ////////////////////////////on leave the group///////////////////////////////////////////////////
  $("#leaveGroup").submit(function(event){
    event.preventDefault();
 
    if (request) {
        request.abort();
    }
 
    var $form = $(this);
 
    var $inputs = $form.find("input");
 
    var serializedData = $form.serialize();
    $inputs.prop("disabled", true);
 
    request = $.ajax({
        url: "group/group_leave.php",
        type: "POST",
        data: serializedData
    });
 //success window// style and script ar included in navbar
    request.done(function (response, textStatus, jqXHR){
         Swal.fire({
             position: 'center',
             type: 'success',
             title: 'You are successfully left this group!',
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
// window.location.pathname='myoop/group/action_group.php'