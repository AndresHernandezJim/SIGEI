$(function(){
	//alert("iniciando");
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();
	$('.slider').slider();
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
	$(document).ready(function() {
    $('select').material_select();
    $('.tooltipped').tooltip({delay: 50});
	});
	$('.modal-trigger').leanModal();
})
