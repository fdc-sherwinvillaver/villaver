$(document).ready(function(){

	$('#loginUser').on('submit',function(e){
		e.preventDefault();

		$.ajax({
			type:"POST",
			url:"/users/login",
			data:$('#loginUser').serialize(),
			success: function(data){
				console.log(data);
			}
		});
	});
});