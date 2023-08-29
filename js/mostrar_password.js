function mostrarPassword(){
		var cambio = document.getElementById("inputpassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#showpassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});
