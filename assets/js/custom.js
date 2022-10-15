function Angkasaja(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))

	return false;
	return true;
}

// mengubah format tanggal datepicker
$(document).ready(function () {
	$('#tgllahir').datepicker({
		format: "dd-mm-yyyy",
		autoclose:true
	});
});