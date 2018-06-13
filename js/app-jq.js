$(document).ready(function(){
    
    	$('.formularioA').hide();

//Autorizados

    $("#AgregarAu").click(function(){
	$('.formularioA').hide(500);
	$('#AutorizadoForm').show(500);
    });

    $("#MostrarAu").click(function(){
	$('.formularioA').hide(500);
	$('#ListaAutorizado').show(500);
    });


    $("#MostrarAl").click(function(){
	$('.formularioA').hide(500);
	$('#ListaAlumnos').show(500);
    });
});
