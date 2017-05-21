function capturaDatosUsuario(id){
    var url = "cargarusuario.php";
    $.post(url,{idUsuario:id},
           function (data){       
            $("#respuesta").html(data);
    });
};