////  Cuentas Por Cobrar
function ajax_act(str,tbld, estado,tipoCliente) {
    //alert("Estado:  "+estado);
    //alert("Tipo:   "+tipoCliente);
    if(tipoCliente==='0'){ $("#titulo").html("Clientes Normales");    }
    if(tipoCliente==='1'){ $("#titulo").html("Clientes Morosos");    }
    if(tipoCliente==='2'){ $("#titulo").html("Clientes Incobrables");    }
    if(tipoCliente==='3'){ $("#titulo").html("Clientes");     }
    
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("actualizar").innerHTML = xmlhttp.responseText;    
            // Recarga Tabla con Nuevos Datos
            $('.tablaAct').DataTable();
        }
    }
    xmlhttp.open("post", "../../asset/ajax/cuentasXcobrar.php?estado=" + estado+"&opcion="+tbld+"&tipoCliente="+tipoCliente, true);
    xmlhttp.send();
}

function lanzaModal(id){
            var tipo=document.getElementById('condi2').value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cargala").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("post", "../../asset/ajax/opcionesCliente.php?id=" + id+"&tipoCliente="+tipo, true);
            xmlhttp.send();
        }

function ajax_baja_alta(str,id, estado,tbld,tipoCliente) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("actualizar").innerHTML = xmlhttp.responseText;
            $("#condi").val(estado);
            $("#condi").change();
            $('#editarProducto').modal('hide');
            ajax_act('',tbld,estado,tipoCliente);
        }
    }
    xmlhttp.open("post", "../../asset/ajax/darBajaAlta.php?estado=" + estado+"&id="+id+"&tbld="+tbld, true);
    xmlhttp.send();
}

function darBaja(id,mensaje,tbld,estado,tipoCliente){
	$.confirm({
    theme: 'material',
    title: 'Confirmación!',
    content: mensaje,
    buttons: {
        confirm: function () {
            ajax_baja_alta('',id,estado,tbld,tipoCliente);
        },
        cancel: function () {
        }
    }
});
}