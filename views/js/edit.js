console.log("Edit");
$(document).ready(function(){

	var bindDatePicker = function() {
		$(".date").datepicker({
			format: "yyyy-mm-dd",
			container: '.form-group',
			autoclose: true
		});
	}
   
   bindDatePicker();
});

