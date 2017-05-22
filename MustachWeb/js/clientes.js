function capturaDatosCliente(id){    
    var url = "cargarcliente.php";
    $.post(url,{idCliente:id},
           function (data){       
            $("#respuesta").html(data);
    });
};