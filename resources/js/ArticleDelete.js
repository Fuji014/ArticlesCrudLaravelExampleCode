$(document).ready(function(){
        
        var article_id;
        $('.delete').click(function(){
            article_id = $(this).attr('id');
           $('#confirmModal').modal('show');
        });
        $('#ok_button').click(function(){
          $.ajax({
           url:"Article/"+article_id,
           beforeSend:function(){
            $('#ok_button').text('Deleting...');
           },
           success:function(data)
           {
            setTimeout(function(){
             $('#confirmModal').modal('hide');
             window.location.href = "/";
            }, 2000);
           }
          })
         });

});

    