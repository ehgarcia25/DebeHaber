$(document).ready(function() {
    $('.summernote').summernote({
	  height: 350
	});
    

       
	if($('#fecha').val()==""){
		
	$('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
    })
	.datepicker("setDate", new Date());
	
	}
    
	
    
    $('#cp1').colorpicker({
        format: 'hex'
    });
    $('#cp2').colorpicker();
    
    $('#timepicker1').timepicker();
});