function usuarios(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
    url:'query/usuarios_ajax.php',
    data: parametros,
    beforeSend: function(objeto){
        $("#loader").html("<img src='../assets/images/loader.gif'>");
    },
     success:function(data){
        $(".outer_div_usuarios").html(data).fadeIn('slow');
        $("#loader").html("");
    }
    })
}
        
$("#form_password").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_password")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/password_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_pass').html("Enviando datos");
        },
        success:function(datos){
            $('#div_pass').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_pass').html(datos);
                setTimeout("jQuery('#div_pass').hide();",4000); 
            }else{
                $('#div_pass').html(datos);
                setTimeout("jQuery('#div_pass').hide();",6000); 
            }
        }
    });
})

$("#form_perfil").submit(function(event){
    event.preventDefault();
    var parametros = new FormData($("#form_perfil")[0]);
    $.ajax({
        type:'POST',
        datatype:'json',
        data:parametros,
        url:"query/perfil_update.php",
        contentType:false,
        processData:false,
        beforeSend: function(objeto){
            $('#div_perfil').html("Enviando datos");
        },
        success:function(datos){
            $('#div_perfil').show();
            var valor = datos.toString();
            var busc = valor.indexOf('Error');
            if(busc != -1){
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",4000); 
            }else{
                $('#div_perfil').html(datos);
                setTimeout("jQuery('#div_perfil').hide();",6000); 
            }
        }
    });
})