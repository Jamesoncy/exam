<?php include("footer.php");?>

<script type="text/javascript">
$(document).ready(function(){
    $('#images').on('change',function(){
        var imgVal = $('#images').val(),
           imgPreview = $("#images_preview"); 
        imgPreview.html("");
        if(imgVal!='') 
        {
            imgPreview.html('<center><i class="fa fa-spinner fa-4x fa-spin"></i></center>');
            $('#multiple_upload_form').ajaxForm({
                target:'#images_preview',
                beforeSubmit:function(e){
                    $('.uploading').show();
                },
                success:function(e){
                    $('.uploading').hide();
                },
                error:function(e){
                }
            }).submit();
        }
    });


    $('body').on('keyup', '.cmnt-text', function() {

        var elem = $(this), 
          elemValue = $.trim(elem.val()),
          elemButtonId = elem.attr("data-id"),
          buttonName = "#button-"+elemButtonId;

            if(elemValue != "") $(buttonName).prop('disabled', false);
            else $(buttonName).prop('disabled', true);
    });

    $(document).on('click', '.btn-small', function()
    {
        var elem = $(this), 
          elemTextArea = elem.attr("text-area-id"),
          id = elem.attr("data-id"),
          elemValue = $.trim($("#"+elemTextArea).val())
          form = $("#form-"+id)
          former_form = form.html();
          form.html('<center><i class="fa fa-spinner fa-spin"></i><center>');
        
        if(elemValue != ""){
            $.post( "update_picture.php", { id: id, tags: elemValue })
                .done(function( data ) {
                     var title = "Success",
                      message = "Photo Tag Updated Successfully";
                        if(data!=1) {
                            title = "Failed"; 
                            message = "Photo Tag Updated Unsuccessfully"; 
                        } 

                    bootbox.alert({
                        title: title,
                        message: message
                    })
                form.html("<center><p class = 'half-txt p-top-30'>"+elemValue+"</p></center>");
            });
        }
    });
});
</script>

</body>
</html>