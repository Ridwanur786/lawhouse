$(document).ready(function(){
    //$('#all-comments').hide();
	showComments();
    $('#commentForm').on('submit', function(e){
        e.preventDefault();
		//showComments().disable();
var formData = $(this).serialize();
      //  var message = $('#Messages').val();
        $.ajax({
            url: "../scripts/comment.php",
            method: "POST",
            data:
               formData,
            dataType: "JSON",
            success:function(response) {
                if(!response.error) {
					$('#commentForm')[0].reset();
                    $('#commentId').val(0);
                    showComments();
					if($("#countNumber").length > 0) {
                        var currentCount = parseInt($("#countNumber").html());
                        var newCount = currentCount + 1;
                        $("#countNumber").html(newCount)
                    } 
					   $('#message').fadeIn('500').html(response.message);
                    $('#message').fadeOut('500').html(response.message);
                    $('#message').fadeIn('500').html(response.message);
                    $('#message').fadeOut('500').html(response.message);
                }else {
                 $('#message').fadeIn('500').html(response.message);
                    $('#message').fadeOut('500').html(response.message);
                    $('#message').fadeIn('500').html(response.message);
                    $('#message').fadeOut('500').html(response.message);
                }
            }
        });            
        //return false;
    });
    $(document).on('click','.reply', function(){
        var commentId = $(this).attr('id');
        $('#commentId').val(commentId);
        $('#name').focus();
    });

});

function showComments() {
    $.ajax({
        url:"../scripts/disqus.php",
        type:"POST",
		//dataType: "JSON",
        success:function(response) {
           // $('#all-comments').show();
            $('#showComments').html(response);
        }
    })
}

$(document).on('click','.delClick',function (e) {
	e.preventDefault();	
			var element = $(this).parent().parent();
		var del_id = $(this).attr('id');
    $.ajax({
        url:"../scripts/disqus_template.php",
        type: "POST",
        data: "id=" + del_id,
        dataType: "JSON",
		cache: false,
        success: function (response){          
            if(response.error) {			 
                $('#delmessage').fadeIn('500').html(response.message);
                $('#delmessage').fadeOut('500').html(response.message);
                $('#delmessage').fadeIn('500').html(response.message);                      
                $('#delmessage').fadeOut('500').html(response.message);                      
                //$('#delmessage').fadeIn('500').html(response.message);                      
                //$('#delmessage').fadeOut('500').html(response.message);  
            element.slideUp('slow', function() {$(this).remove();});
if($("#countNumber").length > 0) {
                        var currentCount = parseInt($("#countNumber").text());
                        var newCount = currentCount - 1;
                        $("#countNumber").text(newCount)
                    } 				
            }		
        }

    });
    return false;

  // return false;
});

