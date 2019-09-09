////////////////////////////on delete///////////////////////////////////////////////////
 $(document).ready(function(){
    $('#delete_category').click(function(){
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
                url:"category/category_delete.php",
                method: "POST",
                data:{cat_id:id}, 
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

