$(document).ready(function () {
    $('#form').on('submit',function (e) {
        e.preventDefault();
        var name = $('#Name').val();
        var email = $('#E-mail').val();
        var number =$('#Mobile').val();
        var message = $('#Messages').val();
        $.ajax({
            type: 'post',
            url: "formInput.php",
            dataType:'text',
            data: {name:name,
                email:email,
                number:number,
                message:message
            },
            success: function(data)
            {
                $('#result').show().fadeIn('slow').html(data);
                $('#result').show().fadeOut('slow').html(data);
                $('#result').show().fadeIn('slow').html(data);
                $('#result').show().fadeOut('slow').html(data);
            }

        });
        $('#form')[0].reset();
        return false;
    });

});