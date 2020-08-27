function validar_formulario(){

	var cantidad,cliente,producto,valor,gasto,estado,expresion;

	cantidad = document.getElementById("inputcantidad").value;
	cliente = document.getElementById("inputcliente").value;
	producto = document.getElementById("selectproducto").value;
	valor = document.getElementById("inputvalor").value;
	gasto = document.getElementById("inputgasto").value;
	estado = document.getElementById("selectestado").value;

	if (cantidad === "" || cliente === "" || producto === "" || valor === "" || gasto === "" || estado === "") {
		alert("Todos los campos son obligatorios");
		return false;
	}else if (isNaN(cantidad)) { //isNan = si campos no es un numero
		alert("Cantidad debe ser formato numerico");
		return false;
	}else if (isNaN(valor)) { 
		alert("Valor debe ser formato numerico");
		return false;	
	}else if (isNaN(gasto)) {
		alert("Gasto debe ser formato numerico");
		return false;
	}
}
