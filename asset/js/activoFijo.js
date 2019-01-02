////  Activo Fijo

///// Categorias
function ajax_act(str,tbld, estado) {
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
    xmlhttp.open("post", "../../asset/ajax/activoFijo.php?estado=" + estado+"&opcion="+tbld, true);
    xmlhttp.send();
}

function ajax_baja_alta(str,id, estado,tbld) {
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
            ajax_act('',tbld,estado);
        }
    }
    xmlhttp.open("post", "../../asset/ajax/darBajaAlta.php?estado=" + estado+"&id="+id, true);
    xmlhttp.send();
}

function darBaja(id,mensaje,tbld,estado){
	$.confirm({
    theme: 'material',
    title: 'Confirmación!',
    content: mensaje,
    buttons: {
        confirm: function () {
            ajax_baja_alta('',id,estado,tbld);
        },
        cancel: function () {
        }
    }
});
}