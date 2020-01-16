$(document).ready(function(){
    $('#enviar').click(function(){
     var urrl = '../php/AddComents.php';
     var frm = $("#fcoments")[0];
     var fd = new FormData(frm);
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: urrl,
            contentType: false,
            processData: false,
            data: fd,
            dataType: "html",
            success: function(data){
            $('#mensaje').html('<strong>Comentario insertado correctamente.</strong>');
            console.log(data);
        },
        error: function(){
            $('#mensaje').html('<strong>Error al insertar el comentario.</strong>');
            console.log(data)
        }
        });
    });
});