$(function(){

	function readURL(input) {
    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#profile').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('#upload:hidden').on('change',function(){
		readURL(this);
	});

    $("#file_upload").on('click', function(e){
        $("#upload:hidden").trigger('click');
    });

    $('#date').attr('type', 'date');
});